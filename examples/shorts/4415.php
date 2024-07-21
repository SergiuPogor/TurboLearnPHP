<?php

// Example: Using __invoke Magic Method in PHP

class CallableClass {
    public function __invoke($param) {
        echo "Calling object as function with parameter: " . $param . "\n";
    }
}

$obj = new CallableClass();
$obj("Hello World"); // This calls __invoke method implicitly

?>