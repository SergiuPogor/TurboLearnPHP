<?php

// Example of advanced PHP error handling techniques

// Custom error handler function
function customErrorHandler($severity, $message, $file, $line) {
    // Log the error to a file or database
    $errorLog = "Error: [$severity] $message in $file line $line";
    file_put_contents('error.log', $errorLog . PHP_EOL, FILE_APPEND);
    
    // Display user-friendly error message
    echo "Oops! Something went wrong. Please try again later.";
}

// Set custom error handler
set_error_handler('customErrorHandler');

// Example: Trying to read a file that doesn't exist
$file = 'nonexistent_file.txt';
if (!file_exists($file)) {
    trigger_error("File '$file' does not exist", E_USER_ERROR);
}

?>