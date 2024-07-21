<?php

// Example of custom error handling in PHP

// Error handler function
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log the error to a file or database
    $logMessage = "[" . date('Y-m-d H:i:s') . "] Error: {$errstr} in {$errfile} at line {$errline}\n";
    file_put_contents('error.log', $logMessage, FILE_APPEND);

    // Display a custom error message to the user
    echo "Oops! Something went wrong. Please try again later.";
}

// Set custom error handler
set_error_handler('customErrorHandler');

// Example usage causing an error
$undefinedVar = $someVar; // This will trigger a notice and invoke customErrorHandler

// Restore default error handler (if needed)
// restore_error_handler();
?>