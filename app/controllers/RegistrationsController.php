<?php

use Codivex\Services\RegistrationCreatorService;
use Codivex\Exceptions\ValidationException;

class RegistrationsController extends \BaseController {

    protected $registrationCreator;
    public function __construct(RegistrationCreatorService $registrationCreator)
    {
        $this->beforeFilter('auth');
        $this->registrationCreator = $registrationCreator;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return View::make('registrations.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
        {
            $create = $this->registrationCreator->make(Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        if(count(Input::get('stock_id')) == 1)
        {
            $stock = Stock::find(Input::get('stock_id')[0]);
            return Redirect::action('StocksController@show', [$stock->customer_id, $stock->id])
                ->withSuccess('Log succesvol toegevoegd aan product');
        }

        return Redirect::action('StocksController@index', [(Input::get('status') == 5) ? Input::get('toFactory') : Input::get('customer_id')])
            ->withSuccess('Log succesvol toegevoegd aan product(en)');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $registration = Registration::with('stock.customer', 'stock.product')->find($id);
        $date = $registration->created_at->toDateString();
		return View::make('registrations.edit', compact('registration', 'date'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
        {
            $this->registrationCreator->update($id, Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        $registration = Registration::with('stock.customer')->find($id);
        return Redirect::action('StocksController@show', [$registration->stock->customer->id, $registration->stock_id])->withSuccess('Log is succesvol gewijzigd.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $registration = Registration::findOrFail($id);
        //$customer = Stock::find($registration->stock_id);
        //return $customer;

        if($registration->status ==4)
        {
            // Rollback S\N
            $stock = Stock::find($registration->stock_id);
            $stock->serialNumber = $registration->oldSn;
            $stock->save();
        }
        if($registration->status ==5)
        {
            // Rollback Factory
            $stock = Stock::find($registration->stock_id);
            $stock->customer_id = $registration->oldFactory;
            $stock->save();
        }
        $registration->delete();
        $customer = Stock::find($registration->stock_id);

        return Redirect::action('StocksController@show', [$customer->customer_id, $registration->stock_id])->withSuccess('Log succesvol verwijdert');
	}

}