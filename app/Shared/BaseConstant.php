<?php

namespace App\Shared;

use ReflectionClass;

class BaseConstant
{
    public function __construct()
    {
    }

    /**
     * Get list of class constant members
     */
    public function getConstants()
    {
        $reflectionClass = new ReflectionClass($this);
        return $reflectionClass->getConstants();
    }
}
