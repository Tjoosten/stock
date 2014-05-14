<?php namespace Codivex\Services;

use Codivex\Validators\CountryValidator;
use Codivex\Exceptions\ValidationException;
use Country;

class CountryCreatorService {

    protected $validator;
    public function __construct(CountryValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            Country::create($attributes);

            return true;
        }

        throw new ValidationException('Country validation failed', $this->validator->getErrors());
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValidUpdate($attributes))
        {
            $country = Country::find($id);
            $country->update($attributes);

            return true;
        }

        throw new ValidationException('Country update validation failed', $this->validator->getErrors());
    }
}