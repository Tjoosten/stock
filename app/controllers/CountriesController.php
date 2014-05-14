<?php

use \Codivex\Services\CountryCreatorService;
use \Codivex\Exceptions\ValidationException;

class CountriesController extends \BaseController {

    protected $countryCreator;
    public function __construct(CountryCreatorService $countryCreator)
    {
        $this->beforeFilter('auth');
        $this->countryCreator = $countryCreator;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $countries = Country::with('suppliers', 'customers')->get();
		return View::make('countries.index', compact('countries'));
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
            $this->countryCreator->make(Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        return Redirect::action('CountriesController@index')->withSuccess('Land succesvol toegevoegd.');
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
        $country = Country::find($id);
		return View::make('countries.edit', compact('country'));
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
            $this->countryCreator->update($id, Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('CountriesController@index')->withSuccess('Land succesvol gewijzigd.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $country = Country::with('suppliers')->find($id);
        if($country->suppliers->count() <= 0)
        {
            $country->delete();
            return Redirect::action('CountriesController@index')->withSuccess('Land is succesvol verwijdert uit het systeem.');
        }

        return Redirect::action('CountriesController@index')->withErrors('Fout opgetreden bij het verwijderen.');
	}

}