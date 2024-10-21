<?php

namespace App\Exceptions;

use Exception;

class ModelNotFoundException extends Exception
{
    protected $model;
    public function __construct($model){
        $this->model=$model;
        parent::__construct(message:"${model} Not Found", code:404);
    }
}
