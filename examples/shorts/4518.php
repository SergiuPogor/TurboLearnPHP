<?php

// Example of a custom exception class in PHP

class CustomException extends Exception {
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    
    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}

// Example usage:
try {
    $age = 17;
    if ($age < 18) {
        throw new CustomException("You must be at least 18 years old.");
    }
    echo "Welcome to the club!";
} catch (CustomException $e) {
    echo $e;
    $e->customFunction();
}

?>