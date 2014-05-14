<?php namespace Codivex\Validators;


class CountryValidator extends Validator{
    protected static $rules = [
        'name'          =>  'required',
        'country_code'  =>  'required|size:2|unique:countries'
    ];

    protected static $update_rules = [
        'name'          =>  'required',
        'country_code'  =>  'required|size:2'
    ];

    protected static $messages = [
        'name.required'     =>  'Landsnaam is verplicht',
        'country_code.required' =>  'Landcode is verplicht',
        'country_code.size'     =>  'Lengte kan niet langer zijn dan 2 karakters lang.',
        'country_code.unique'   =>  'Deze Landcode bestaat al.'
    ];
} 