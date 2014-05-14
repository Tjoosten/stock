<?php
use Codivex\Services\CustomerCreatorService;
use Codivex\Exceptions\ValidationException;

class CustomersController extends \BaseController {

    protected $customerCreator;
    public function __construct(CustomerCreatorService $customerCreator)
    {
        $this->beforeFilter('auth');
        $this->customerCreator = $customerCreator;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $customers = Customer::getPaginate(Input::all());
		return View::make('customers.index', compact('customers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $countries = Country::lists('name', 'id');
        $partnerships = Partnership::lists('name', 'id');
        return View::make('customers.create', compact('countries', 'partnerships'));
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
            $create = $this->customerCreator->make(Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('CustomersController@index')->withSuccess('Klant succesvol toegevoegd');
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
        $customer = Customer::findOrFail($id);
        $countries = Country::all()->lists('name', 'id');
        $partnerships = Partnership::lists('name', 'id');
        return View::make('customers.edit', compact('countries', 'customer', 'partnerships'));
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
            $update = $this->customerCreator->update($id, Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('CustomersController@index')->withSuccess('Klant succesvol gewijzigd');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$customer = Customer::with('stocks')->find($id);

        if($customer->stocks->count() == 0)
        {
            $customer->delete();
            return Redirect::action('CustomersController@index')->withSuccess('Klant succesvol verwijdert');
        }
        return Redirect::back();
	}

}