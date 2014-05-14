<?php namespace Codivex\Validators;


class SearchValidator extends Validator{
    protected static $rules = [
        'search'  =>  'required|min:3'
    ];
} 