<?php namespace Codivex\Services;

use Codivex\Validators\LoginValidator;
use Codivex\Exceptions\ValidationException;
use Auth;

class LoginService {
    protected $validator;

    public function __construct(LoginValidator $validator)
    {
        $this->validator = $validator;
    }

    public function auth(array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            $attempt = Auth::attempt(array(
                'username' => $attributes['username'],
                'password' => $attributes['password']
            ));

            return $attempt;
        }

        throw new ValidationException('Login validation failed', $this->validator->getErrors());
    }
}