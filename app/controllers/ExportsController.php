<?php

class ExportsController extends \BaseController {

    public function index()
	{
        return View::make('exports.index');
	}

    public function productExport()
    {
        $data = Product::with('supplier', 'category')->get();

        return Excel::loadView('exports.productsExport')
            ->with('data', $data)
            ->setTitle('Products')
            ->export('xls');
    }

    public function historyExport()
    {
        $data = Registration::with('stock.product.supplier', 'stock.product.category', 'stock.customer.country')->orderBy('created_at')->get();
        return Excel::loadView('exports.historyExport')
            ->with('data', $data)
            ->setTitle('Historiek')
            ->export('xls');
        //return View::make('exports.historyExport', compact('data'));
    }
}