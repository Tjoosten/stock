<?php

class Customer extends \Eloquent {
	protected $guarded = ['id'];
    protected $table = 'customers';

    public function country()
    {
        return $this->hasOne('Country', 'id', 'country_id');
    }

    public function partnership()
    {
        return $this->hasOne('Partnership', 'id', 'partnership_id');
    }

    public function stocks()
    {
        return $this->hasMany('Stock');
    }

    public static function search($keyword)
    {
        return static::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('btw', 'LIKE', '%' . $keyword . '%');
    }

    public static function getPaginate(array $params, $size = 20)
    {
        if(isset($params['sortBy']) and isset($params['direction']))
        {
            return static::with('country', 'partnership', 'stocks')->orderBy($params['sortBy'], $params['direction'])->paginate($size);
        }
        return static::with('country', 'partnership', 'stocks')->paginate($size);
    }
}