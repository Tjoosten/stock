<?php

use \Codivex\Exceptions\ValidationException;
use \Codivex\Services\CategoryCreatorService;

class CategoriesController extends \BaseController {

    protected $categoryCreator;
    public function __construct(CategoryCreatorService $categoryCreator)
    {
        $this->beforeFilter('auth');
        $this->categoryCreator = $categoryCreator;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($supplier_id)
	{
        $supplier = Supplier::with('categories.products')->find($supplier_id);
        $categories = $supplier->categories;

		return View::make('categories.index', compact('supplier', 'categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        //return View::make('categories.create');
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
            $create = $this->categoryCreator->make(Input::all(), $supplier_id);
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('CategoriesController@index', $supplier_id)->withSuccess('Category succesvol toegevoegd.');
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
	public function edit($supplier_id, $id)
	{
        $category = Category::find($id, $supplier_id);
        return View::make('categories.edit', compact('category'));
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
            $this->categoryCreator->update($id, Input::all());
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return Redirect::action('CategoriesController@index', $supplier_id)->withSuccess('Category succesvol toegevoegd.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($supplier_id, $id)
	{
		$category = Category::with('products')->find($id);

        if($category->products)
        {
            $category->delete();
            return Redirect::action('CategoriesController@index', $supplier_id)->withSuccess('Category succesvol verwijderd.');
        }

        return Redirect::back();
	}

}