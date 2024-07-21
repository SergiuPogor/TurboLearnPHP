<?php

// Example of advanced error handling in PHP

// Custom error handler function
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log errors to a file or database
    $logMessage = "Error: [$errno] $errstr - File: $errfile, Line: $errline";
    error_log($logMessage, 3, "error.log");

    // Display user-friendly error message
    echo "Oops! Something went wrong. Please try again later.";
}

// Set custom error handler
set_error_handler("customErrorHandler");

// Example code that may trigger an error
$divisor = 0;
try {
    $result = 10 / $divisor; // Attempting to divide by zero
    echo "Result: $result";
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
}

?>