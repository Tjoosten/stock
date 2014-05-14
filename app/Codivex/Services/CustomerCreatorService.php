<?php namespace Codivex\Services;

use Codivex\Validators\CustomerValidator;
use Codivex\Exceptions\ValidationException;
use Customer;

class CustomerCreatorService {
    protected $validator;

    public function __construct(CustomerValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            Customer::create($attributes);

            return true;
        }

        throw new ValidationException('Customer validation failed', $this->validator->getErrors());
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValidUpdate($attributes))
        {
            $customer = Customer::find($id);
            $customer->update($attributes);

            return true;
        }

        throw new ValidationException('Customer update validation failed', $this->validator->getErrors());
    }
}