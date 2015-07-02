<?php

class Stock extends \Eloquent {
	protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function customer()
    {
        return $this->belongsTo('Customer');
    }

    public function registrations()
    {
        return $this->hasMany('Registration');
    }

    public function lastRegistration()
    {
        return $this->hasOne('Registration')->orderBy('id', 'DESC');
    }

    public static function find($id, $customer_id = null)
    {
        $search = Static::with('product.supplier', 'product.category', 'customer', 'registrations')->find($id);

        if($customer_id and $search->customer->id != $customer_id)
        {
            throw new Illuminate\Database\Eloquent\ModelNotFoundException;
        }

        return $search;
    }

    public static function search($keyword)
    {
        return static::with('product.category', 'customer')
            ->where('serialNumber', 'LIKE', '%' . $keyword . '%');
    }

    public static function searchProduct($keyword)
    {
        return static::with([
            'product' => function($query) use($keyword){
                    $query->where('name', 'LIKE', '%' . $keyword . '%');
                },
            'product.category',
            'customer'
        ]);
    }
}
