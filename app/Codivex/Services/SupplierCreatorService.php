<?php namespace Codivex\Services;

use Codivex\Validators\SupplierValidator;
use Codivex\Exceptions\ValidationException;
use Supplier;

class SupplierCreatorService {
    protected $validator;

    public function __construct(SupplierValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            // Creating Supplier
            Supplier::create($attributes);

            return true;
        }

        throw new ValidationException('Supplier validation failed', $this->validator->getErrors());
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            $supplier = Supplier::find($id);
            $supplier->update($attributes);

            return true;
        }

        throw new ValidationException('Supplier update validation failed', $this->validator->getErrors());
    }
}