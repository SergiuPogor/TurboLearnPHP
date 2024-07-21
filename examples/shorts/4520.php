<?php

// Example of custom exception handling in PHP

class CustomException extends Exception {
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}] {$this->message}\n";
    }
}

// Example usage:
try {
    $data = []; // Simulate empty data
    if (empty($data)) {
        throw new CustomException("Data is empty. Please check again.");
    }
} catch (CustomException $e) {
    echo $e;
    // Log the exception to a file or database
    error_log($e->getMessage(), 3, "error.log");
}

?>