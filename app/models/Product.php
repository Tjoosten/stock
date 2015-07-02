<?php

class Product extends \Eloquent {
    protected $guarded = [];
    protected $table = 'products';

    public function supplier()
    {
        return $this->belongsTo('Supplier');
    }

    public function category()
    {
        return $this->hasOne('Category', 'id', 'category_id');
    }

    public function stocks()
    {
        return $this->hasMany('Stock');
    }

    public static function find($id, $supplier_id = null)
    {
        $search = Static::with('supplier')->find($id);
	
	if($supplier_id and $search->supplier->id != $supplier_id)
        {
            throw new Illuminate\Database\Eloquent\ModelNotFoundException;
        }

        return $search;
    }

    public static function search($keyword)
    {
        return static::with('supplier', 'category')
            ->where('name', 'LIKE', '%' . $keyword . '%');
    }
}
