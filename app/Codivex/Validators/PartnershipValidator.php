<?php namespace Codivex\Validators;


class PartnershipValidator extends Validator{
    protected static $rules = [
        'name'          =>  'required'
    ];

    protected static $update_rules = [
        'name'          =>  'required'
    ];

    protected static $messages = [
        'name.required'     =>  'Naam van venootschap is een verplicht veld'
    ];
} 