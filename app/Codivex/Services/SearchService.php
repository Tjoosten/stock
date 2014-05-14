<?php namespace Codivex\Services;

use Codivex\Validators\SearchValidator;
use Codivex\Exceptions\ValidationException;

class SearchService {
    protected $validator;

    public function __construct(SearchValidator $validator)
    {
        $this->validator = $validator;
    }

    public function validate(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            return true;
        }

        throw new ValidationException('Search validation failed', $this->validator->getErrors());
    }
}