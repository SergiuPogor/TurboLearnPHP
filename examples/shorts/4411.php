<?php

// Example: Custom Exception with Custom Error Message
class CustomException extends Exception {
    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct("Custom Exception: " . $message, $code, $previous);
    }
}

// Usage Example
function divide($dividend, $divisor) {
    if ($divisor === 0) {
        throw new CustomException("Division by zero is not allowed.");
    }
    return $dividend / $divisor;
}

// Try-catch block
try {
    echo divide(10, 0);
} catch (CustomException $e) {
    echo "Caught exception: " . $e->getMessage();
}

?>