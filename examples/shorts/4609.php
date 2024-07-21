<?php

// Example: Using PHP's __invoke Magic Method
class CallableClass {
    public function __invoke($param) {
        echo "Calling object as a function with parameter: " . $param;
    }
}

// Creating an instance of the CallableClass
$callableObj = new CallableClass();

// Using the object as a callable function
$callableObj("Hello, World!");