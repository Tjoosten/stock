<?php

use Codivex\Services\SupplierCreatorService;
use Codivex\Exceptions\ValidationException;

class SuppliersController extends \BaseController {

    protected $supplierCreator;
    public function __construct(SupplierCreatorService $supplierCreator)
    {
        $this->beforeFilter('auth');
        $this->supplierCreator = $supplierCreator;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $suppliers = Supplier::with('country', 'products')->orderBy('name')->get();
		return View::make('suppliers.index', compact('suppliers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $countries = Country::all()->lists('name', 'id');
        return View::make('suppliers.create', compact('countries'));
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
            $create = $this->supplierCreator->make(Input::all());
        } catch (ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('SuppliersController@index')->withSuccess('Leverancier succesvol toegevoegd');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // INDEX van productcontroller handelt dit af.
        //$supplier = Supplier::findOrFail($id);
        //return View::make('suppliers.show', compact('supplier'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $supplier = Supplier::findOrFail($id);
        $countries = Country::all()->lists('name', 'id');
        return View::make('suppliers.edit', compact('supplier', 'countries'));
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
            $this->supplierCreator->update($id, Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
        return Redirect::action('SuppliersController@index')->withSuccess('Leverancier gewijzigd');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $supplier = Supplier::with('products')->find($id);
        if($supplier->products->count() == 0)
        {
            $confirm = Input::get('deleteConfirmation');
            if($confirm == "DELETE")
            {
                $supplier->delete();
                return Redirect::action('SuppliersController@index')->withSuccess('Leverancier succesvol verwijdert.');
            }

            return Redirect::action('SuppliersController@index')->withErrors('Bevestiging is niet compleet! Het invulveld komt niet overeen.');
        }
        return Redirect::action('SuppliersController@index')->withErrors('Deze leverancier bevat nog producten. Verwijder deze eerst');
	}

}