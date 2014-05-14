<?php namespace Codivex\Validators;

use Validator as V;

abstract class Validator {

    protected $errors;

    public function isValid(array $attributes)
    {
        if(isset(static::$messages))
        {
            $v = V::make($attributes, static::$rules, static::$messages);
        } else {
            $v = V::make($attributes, static::$rules);
        }

        return $this->setErrors($v);
    }

    public function isValidUpdate(array $attributes)
    {
        if(isset(static::$messages))
        {
            $v = V::make($attributes, static::$update_rules, static::$messages);
        } else {
            $v = V::make($attributes, static::$update_rules);
        }

        return $this->setErrors($v);
    }

    protected function setErrors($v)
    {
        if($v->fails())
        {
            $this->errors = $v->messages();
            return false;
        }

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}