<?php

use Codivex\Exceptions\ValidationException;
use Codivex\Services\PartnershipCreatorService;

class PartnershipsController extends \BaseController {
    protected $PartnershipCreator;

    public function __construct(PartnershipCreatorService $PartnershipCreator)
    {
        $this->PartnershipCreator = $PartnershipCreator;
    }


    /**
	 * Display a listing of the resource.
	 * GET /partnerships
	 *
	 * @return Response
	 */
	public function index()
	{
        $partnerships = Partnership::with('customers')->orderBy('name')->get();
		return View::make('partnerships.index', compact('partnerships'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /partnerships/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /partnerships
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
            $this->PartnershipCreator->make(Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        return Redirect::action('PartnershipsController@index')->withSuccess('Venootschap succesvol toegevoegd.');
	}

	/**
	 * Display the specified resource.
	 * GET /partnerships/{id}
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
	 * GET /partnerships/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $partnerschip = Partnership::find($id);
		return View::make('partnerships.edit', compact('partnerschip'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /partnerships/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
        {
            $this->PartnershipCreator->update($id, Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        return Redirect::action('PartnershipsController@index')->withSuccess('Venootschap succesvol gewijzigd.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /partnerships/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $partnership = Partnership::with('customers')->find($id);
        if($partnership->customers->count() <= 0)
        {
            $partnership->delete();
            return Redirect::action('PartnershipsController@index')->withSuccess('Venootschap is succesvol verwijdert uit het systeem.');
        }

        return Redirect::action('PartnershipsController@index')->withErrors('Fout opgetreden bij het verwijderen.');
	}

}