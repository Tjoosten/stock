<?php namespace Codivex\Validators;


class SupplierValidator extends Validator{
    protected static $rules = [
        'name'          =>  'required',
        'address'       =>  '',
        'city'          =>  '',
        'postal_code'   =>  '',
        'country_id'    =>  'required|numeric'
    ];
} 