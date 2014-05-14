<?php

class Supplier extends \Eloquent {
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany('Product');
    }

    public function categories()
    {
        return $this->hasMany('Category');
    }

    public function country()
    {
        return $this->hasOne('Country', 'id', 'country_id');
    }

    public static function search($keyword)
    {
        return static::with('country')
            ->where('name', 'LIKE', '%' . $keyword . '%');
    }
}