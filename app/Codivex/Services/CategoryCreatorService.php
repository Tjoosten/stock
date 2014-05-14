<?php namespace Codivex\Services;

use Codivex\Validators\CategoryValidator;
use Codivex\Exceptions\ValidationException;
use Category;

class CategoryCreatorService {
    protected $validator;

    public function __construct(CategoryValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes, $supplier_id)
    {
        if($this->validator->isValid($attributes))
        {
            Category::create([
                'supplier_id'   =>  $supplier_id,
                'name'          =>  $attributes['name']
            ]);

            return true;
        }

        throw new ValidationException('Category validation failed', $this->validator->getErrors());
    }

    public function update($id, array $attributes)
    {
        if($this->validator->isValid($attributes))
        {
            $category = Category::find($id);
            $category->update($attributes);

            return true;
        }

        throw new ValidationException('Category update validation failed', $this->validator->getErrors());
    }
}