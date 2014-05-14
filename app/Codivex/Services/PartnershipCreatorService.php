<?php namespace Codivex\Services;

use Codivex\Validators\PartnershipValidator;
use Codivex\Exceptions\ValidationException;
use Partnership;

class PartnershipCreatorService {

    protected $validator;
    public function __construct(PartnershipValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            Partnership::create($attributes);

            return true;
        }

        throw new ValidationException('Partnership validation failed', $this->validator->getErrors());
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValidUpdate($attributes))
        {
            $partnership = Partnership::find($id);
            $partnership->update($attributes);

            return true;
        }

        throw new ValidationException('Partnership update validation failed', $this->validator->getErrors());
    }
}