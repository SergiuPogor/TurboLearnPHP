<?php
// Set error reporting to show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Example function to demonstrate error handling
function divide($a, $b) {
    if ($b === 0) {
        trigger_error("Division by zero", E_USER_WARNING);
        return false; // Early return on error
    }
    return $a / $b;
}

// Using var_dump to check values before processing
$result = divide(10, 0);
var_dump($result);

// Log errors to a file for review
ini_set('log_errors', 1);
ini_set('error_log', '/tmp/test/php_errors.log');