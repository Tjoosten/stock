<?php

class Category extends \Eloquent {
	protected $guarded = ['id'];

    public function supplier()
    {
        return $this->belongsTo('Supplier');
    }

    public function products()
    {
        return $this->hasMany('Product');
    }

    public static function find($id, $supplier_id = null)
    {
        $search = Static::with('supplier')->find($id);

        if($supplier_id and $search->supplier->id !== $supplier_id)
        {
            throw new Illuminate\Database\Eloquent\ModelNotFoundException;
        }

        return $search;
    }
}