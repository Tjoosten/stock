<?php namespace Codivex\Services;

use Codivex\Validators\StockValidator;
use Codivex\Exceptions\ValidationException;
use Stock;

class StockCreatorService {
    protected $validator;

    public function __construct(StockValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make($customer_id, array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            $attributes['customer_id'] = $customer_id;
            // Creating Stock
            Stock::create($attributes);

            return true;
        }

        throw new ValidationException('Stock validation failed', $this->validator->getErrors());
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValidUpdate($attributes))
        {
            $stock = Stock::find($id);
            $stock->update($attributes);

            return true;
        }

        throw new ValidationException('Stock update validation failed', $this->validator->getErrors());
    }
}