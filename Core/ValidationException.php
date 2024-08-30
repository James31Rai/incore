<?php 

namespace Core;

class ValidationException extends \Exception
{
    protected readonly array $errors;
    protected readonly array $attributes;

    public static function throw($errors, $attributes)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->attributes = $attributes;

        throw $instance;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function attributes()
    {
        return $this->attributes;
    }
}