<?php namespace Codivex\Validators;


class RegistrationValidator extends Validator{
    protected static $rules = [
        'stock_id'      =>  'required',
        'status'        =>  'required',
        'description'   =>  'required_if:status,6',
        'serialNumber'  =>  'required_if:status,4',
        'toFactory'     =>  'required_if:status,5'  //|unique_with:registrations, serialNumber
    ];

    protected static $update_rules = [
        'status'        =>  'required|numeric',
        'created_at'    =>  'required|date',
        'description'   =>  'required_if:status,6'
    ];

    protected static $messages = [
        'stock_id.required'         =>  'Maak een selectie van producten.',
        'status.required'           =>  ':attribute veld is verplicht.',
        'description.required_if'   =>  'Geef een beschrijving van het product.',
        'serialNumber.required_if'  =>  'Serienummer is verplicht invoerveld.',
        'toFactory.required_if'     =>  'Bedrijf verplicht.',
        'created_at.required'       =>  'Datum is verplicht'
    ];
} 