<?php namespace Codivex\Validators;


class CustomerValidator extends Validator{
    protected static $rules = [
        'customerNumber'    =>  '',
        'name'          =>  'required',
        'address'       =>  'required',
        'city'          =>  'required',
        'housenumber'   =>  '',
        'busnumber'     =>  '',
        'postalcode'    =>  '',
        'country_id'    =>  'required',
        'partnership_id'    => '',
        'btw'           =>  'required|unique:customers'
    ];

    protected static $update_rules = [
        'customerNumber'    =>  '',
        'name'          =>  'required',
        'address'       =>  'required',
        'city'          =>  'required',
        'housenumber'   =>  '',
        'busnumber'     =>  '',
        'postalcode'    =>  '',
        'country_id'    =>  'required',
        'partnership_id'    => '',
        'btw'           =>  'required'
    ];
} 