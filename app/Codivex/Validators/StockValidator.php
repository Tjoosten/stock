<?php namespace Codivex\Validators;


class StockValidator extends Validator{
    protected static $rules = [
        'product_id'        =>  'required',
        'serialNumber'      =>  'required|unique_with:stocks, customer_id',
        'warranty'          =>  'required|numeric'
    ];

    protected static $update_rules = [
        'product_id'        =>  'required',
        'serialNumber'      =>  'required',
        'warranty'          =>  'required|numeric'
    ];
} 