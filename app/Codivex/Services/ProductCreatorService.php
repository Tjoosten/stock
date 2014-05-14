<?php namespace Codivex\Services;

use Codivex\Validators\ProductValidator;
use Codivex\Exceptions\ValidationException;
use Product;

class ProductCreatorService {
    protected $validator;

    public function __construct(ProductValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            // Creating Supplier
            Product::create([
                'supplier_id'       =>  $attributes['supplier_id'],
                'name'              =>  $attributes['name'],
                'itemNumber'        =>  $attributes['itemNumber'],
                'defaultWarranty'   =>  $attributes['defaultWarranty'],
                'category_id'       =>  $attributes['category_id'],
                'tariffCode'        =>  $attributes['tariffCode']
            ]);

            return true;
        }

        throw new ValidationException('Product validation failed', $this->validator->getErrors());
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValidUpdate($attributes))
        {
            $product = Product::find($id);
            $product->update($attributes);

            return true;
        }

        throw new ValidationException('Product update validation failed', $this->validator->getErrors());
    }
}