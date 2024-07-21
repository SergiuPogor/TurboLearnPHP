<?php

// Example: Custom Error Logging in PHP

// Error handling function
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Custom error handling logic
    $errorLog = date('Y-m-d H:i:s') . " - Error: [$errno] $errstr in $errfile at line $errline";
    
    // Log errors to a file
    error_log($errorLog, 3, '/var/log/php_errors.log');
    
    // Optionally, display user-friendly error message
    echo "Oops! Something went wrong. Please try again later.";
}

// Register the custom error handler
set_error_handler("customErrorHandler");

// Example: Triggering a custom error (for demonstration)
$file = 'non_existent_file.txt';
if (!file_exists($file)) {
    trigger_error("File '$file' not found", E_USER_ERROR);
}

?>