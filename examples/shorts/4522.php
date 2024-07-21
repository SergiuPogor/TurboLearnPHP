<?php

// Example of PHP exception handling

class CustomException extends Exception {
    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

function divide($dividend, $divisor) {
    try {
        if ($divisor === 0) {
            throw new Exception("Division by zero.");
        }
        return $dividend / $divisor;
    } catch (Exception $e) {
        throw new CustomException("Error: Division failed. " . $e->getMessage());
    }
}

// Example usage
try {
    echo divide(10, 0);
} catch (CustomException $e) {
    echo $e;
}

?>