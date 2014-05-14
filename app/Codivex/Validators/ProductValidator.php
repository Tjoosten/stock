<?php namespace Codivex\Validators;


class ProductValidator extends Validator{
    protected static $rules = [
        'supplier_id'       =>  'required',
        'name'              =>  'required|unique_with:products, category_id',
        'itemNumber'        =>  '', //'unique_with:products, supplier_id',
        'defaultWarranty'   =>  'required|numeric',
        'category_id'       =>  'required|numeric',
        'tariffCode'        =>  'numeric'
    ];

    protected static $update_rules = [
        'supplier_id'       =>  'required',
        'name'              =>  'required',
        'itemNumber'        =>  '',
        'defaultWarranty'   =>  'required|numeric',
        'category_id'       =>  'required|numeric',
        'tariffCode'        =>  'numeric'
    ];
} 