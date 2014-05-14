<?php

class ApiController extends \BaseController {


    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function postProducts()
    {
        $supplier_id = Input::get('supplier_id');
        $products = Supplier::with('products.category')->find($supplier_id);
        $api_output = [];

        if(!$products){
            return Response::json(array(
                "errors"    =>  "No supplier found"
            ), 404);
        }

        foreach($products->products as $product)
        {
            $prodname = isset($product->category->name) ?
                $product->category->name . " - " . $product->name :
                $product->name;

            $response = [
                "id"        =>  $product->id,
                "type"      =>  $prodname,
                "warranty"  =>  $product->defaultWarranty
            ];

            array_push($api_output, $response);
        }

        return Response::json([
            //'products'  =>  $products->products->lists('name', 'id')
            'products'  =>  $api_output
        ], 200);
    }
}