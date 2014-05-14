<?php namespace Codivex\Validators;


class LoginValidator extends Validator{
    protected static $rules = [
        'username'  =>  'required',
        'password'  =>  'required'
    ];
} 