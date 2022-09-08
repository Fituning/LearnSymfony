<?php

namespace App\Services;

class ComplexObject
{
    private $test;
    private $bar;
    private $baz;
    private $other;

    public function __construct(
         $test,
    )
    {
        $this->test = $test;

    }

    public function doSomething() {
        // ...
    }
}