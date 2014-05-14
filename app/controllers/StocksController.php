<?php

use Codivex\Services\StockCreatorService;
use Codivex\Exceptions\ValidationException;

class StocksController extends \BaseController {

    protected $stockCreator;
    public function __construct(StockCreatorService $stockCreator)
    {
        $this->beforeFilter('auth');
        $this->stockCreator = $stockCreator;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($customer_id)
	{
        $productsStock = "";
        $customer = Customer::with(['stocks' => function($query){
                $query->orderBy('product_id');
            }, 'stocks.product.supplier', 'stocks.product.category', 'stocks.lastRegistration'])->find($customer_id);
        $products = $customer->stocks;

        $customers = Customer::orderBy('name')->lists('name', 'id');

        if($customer->id == 1)
        {
            // Get last registration stock id with highest id
            $productsStock = DB::table('registrations as r')
                ->select('id')
                ->whereIn('r.id', function($query){
                $query->select(DB::raw("MAX(id)"))
                    ->from('registrations')
                    ->groupBy('stock_id');
            })->where(function($query){
                    $query->where('status', '=', '1')
                        ->orWhere('status', '=', '3');
                });

            $ids = $productsStock->lists('id');
            if($ids)
            {
                $productsStock = Registration::with(['stock' => function($query){
                        $query->where('customer_id', '<>', '1');
                    }, 'stock.customer', 'stock.product.category', 'stock.product.supplier'])->whereIn('id', $ids)->get();
            } else{
                $productsStock = null;
            }
        }

		return View::make('stocks.index', compact('customer', 'customers', 'products', 'productsStock'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($customer_id)
	{
        $customer = Customer::findOrFail($customer_id);
        $supplier = Supplier::orderBy('name')->lists('name', 'id');

		return View::make('stocks.create', compact('customer', 'supplier'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($customer_id)
	{
        try
        {
            $create = $this->stockCreator->make($customer_id, Input::all());
        } catch (ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        return Redirect::action('StocksController@index', $customer_id)->withSuccess('Product succesvol toegevoegd');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($customer_id, $id)
	{
        $stock = Stock::find($id, $customer_id);
        $customer = $stock->customer;
        $product = $stock->product;
        $registrations = $stock->registrations->toArray();
        $customers = Customer::orderBy('name')->lists('name', 'id');

		return View::make('stocks.show', compact('stock', 'customer', 'product', 'registrations', 'customers'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($customer_id, $id)
	{
        $product = Stock::with('customer')->find($id);
        $customer = $product->customer;
        $supplier = Supplier::all()->lists('name', 'id');

		return View::make('stocks.edit', compact('product', 'supplier', 'customer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($customer_id, $id)
	{
		try
        {
            $update = $this->stockCreator->update($id, Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        return Redirect::action('StocksController@index', $customer_id)->withSuccess('Product succesvol gewijzigd');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($customer_id, $id)
	{
        $stock = Stock::with('registrations')->find($id);
        if($stock->registrations->count() == 0)
        {
            $stock->delete();
            return Redirect::action('StocksController@index', $customer_id)->withSuccess('Product succesvol verwijdert');
        }

        return Redirect::back();
	}

}