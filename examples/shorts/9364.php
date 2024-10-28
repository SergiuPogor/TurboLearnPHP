<?php
// Example of using Xdebug for debugging in PHP
// Ensure Xdebug is installed and configured in php.ini

// Sample function that may throw an error
function riskyFunction($num) {
    if ($num < 0) {
        throw new Exception("Negative number: $num");
    }
    return sqrt($num);
}

// Set up error logging to track issues
ini_set('log_errors', 1);
ini_set('error_log', '/tmp/test/php_errors.log');

// Use try-catch for error handling
try {
    echo riskyFunction(-5);
} catch (Exception $e) {
    // This will be logged to the error log file
    error_log($e->getMessage());
    echo "Caught an error: " . $e->getMessage();
}

// Example of using PHPStorm to set a breakpoint (manual setup required)
function calculateSum($a, $b) {
    return $a + $b; // Set a breakpoint here in PHPStorm
}

$result = calculateSum(5, 10);
echo "Sum is: " . $result;

// Demonstrating basic logging
error_log("Function calculateSum executed with result: $result");