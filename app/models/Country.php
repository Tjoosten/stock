<?php

class Country extends \Eloquent {
	protected $guarded = ['id'];

    public function suppliers()
    {
        return $this->hasMany('Supplier');
    }

    public function customers()
    {
        return $this->hasMany('Customer');
    }
}