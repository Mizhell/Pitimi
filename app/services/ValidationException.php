<?php

class ValidationException extends Exception
{
    private $validator;

    public function __construct($validator)
    {
        $this->validator = $validator;
    }

    public function getValidator()
    {
        return $this->validator;
    }
}
