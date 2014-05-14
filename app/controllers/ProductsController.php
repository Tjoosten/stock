<?php

use Codivex\Services\ProductCreatorService;
use Codivex\Exceptions\ValidationException;

class ProductsController extends \BaseController {

    protected $productCreator;
    public function __construct(ProductCreatorService $productCreator)
    {
        $this->beforeFilter('auth');
        $this->productCreator = $productCreator;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($supplier_id)
	{
        $supplier = Supplier::with('products')->find($supplier_id);
        $products = Product::with('category', 'stocks')
            ->whereSupplierId($supplier_id)
            ->orderBy('category_id', 'asc')
            ->get();

        return View::make('products.index', compact('supplier', 'products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($supplier_id)
	{
        $supplier = Supplier::with('categories')->findOrFail($supplier_id);
        $dropdown = $supplier->categories->lists('name', 'id');
		return View::make('products.create', compact('supplier', 'dropdown'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($supplier_id)
	{
		try
        {
            $data = Input::all();
            $data['supplier_id'] = $supplier_id;

            $create = $this->productCreator->make($data);
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('ProductsController@index', $supplier_id)->withSuccess('Product succesvol toegevoegd.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($supplier_id, $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($supplier_id, $id)
	{
        $product = Product::find($id, $supplier_id);
        $supplier = Supplier::with('categories')->findOrFail($supplier_id);
        $dropdown = $supplier->categories->lists('name', 'id');
		return View::make('products.edit', compact('product', 'dropdown'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($supplier_id, $id)
	{
        try
        {
            $data = Input::all();
            $data['supplier_id'] = $supplier_id;

            $update = $this->productCreator->update($id, $data);
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('ProductsController@index', $supplier_id)->withSuccess('Product succesvol gewijzigd.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($supplier_id, $id)
	{
		$product = Product::with('stocks')->find($id);
        if($product->stocks->count() == 0)
        {
            $product->delete();
            return Redirect::action('ProductsController@index', $supplier_id)->withSuccess('Product succesvol gewijzigd.');
        }
        return Redirect::back();
	}

}