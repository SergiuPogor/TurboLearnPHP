<?php
// File: /tmp/test/catch_fatal_errors.php

// Custom error handler function
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log the error details
    error_log("Error: [$errno] $errstr in $errfile on line $errline");
    echo "Something went wrong! Please try again later.";
}

// Register the custom error handler
set_error_handler("customErrorHandler");

// Function to handle fatal errors
function shutdownHandler() {
    $error = error_get_last();
    if ($error) {
        customErrorHandler($error['type'], 
                           $error['message'], 
                           $error['file'], 
                           $error['line']);
    }
}

// Register the shutdown function
register_shutdown_function('shutdownHandler');

// Example: Triggering a fatal error
function testFatalError() {
    // This will cause a fatal error
    undefinedFunction(); 
}

// Call the function to see the error handling in action
testFatalError();
?>