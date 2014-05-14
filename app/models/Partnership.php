<?php

class Partnership extends \Eloquent {
	protected $guarded = ['id'];

    public function customers()
    {
        return $this->hasMany('Customer');
    }
}