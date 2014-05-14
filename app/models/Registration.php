<?php

class Registration extends \Eloquent {
	protected $guarded = ['id'];

    public function stock()
    {
        return $this->belongsTo('Stock');
    }
}