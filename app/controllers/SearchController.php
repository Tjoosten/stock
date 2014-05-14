<?php
use Codivex\Services\SearchService;
use Codivex\Exceptions\ValidationException;

class SearchController extends \BaseController {

    protected $SearchService;
    public function __construct(SearchService $SearchService)
    {
        $this->beforeFilter('auth');
        $this->SearchService = $SearchService;
    }

    public function index()
	{
        return View::make('search.index');
	}

    public function postSearch()
    {
        try
        {
            $this->SearchService->validate(Input::all());

            $keyword = Input::get('search');
            $suppliers = Supplier::search($keyword)->get();
            $customers = Customer::search($keyword)->take(20)->get();
            $products = Product::search($keyword)->get();
            $stocks = Stock::search($keyword)->get();
            $stockProduct = Stock::searchProduct($keyword)->get();
            //return $stockProduct;

            $isEmpty = null;
            if(!$suppliers->first() and !$customers->first() and !$products->first() and !$stocks->first() and !$stockProduct->first())
            {
                $isEmpty = true;
            }
        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return View::make('search.result', compact('keyword', 'suppliers', 'customers', 'products', 'stocks', 'stockProduct', 'isEmpty'));
    }

    public function getSearchCompany()
    {
        $keyword = "";
        $isEmpty = true;
        return View::make('search.customers_result', compact('keyword', 'isEmpty'));
    }

    public function postSearchCompany()
    {
        try
        {
            $this->SearchService->validate(Input::all());
            $keyword = Input::get('search');
            $customers = Customer::search($keyword)->paginate(10);

            $isEmpty = null;
            if(!$customers->first())
            {
                $isEmpty = true;
            }

        } catch(ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }

        return View::make('search.customers_result', compact('keyword', 'customers', 'isEmpty'));
    }
}