<?php

class Eventlog extends \Eloquent {
	protected $guarded = ['id'];
    protected $table = 'events';

    public function user()
    {
        return $this->belongsTo('User');
    }
}