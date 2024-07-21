<?php
// PHP Error Handling Example

function customErrorHandler($errno, $errstr, $errfile, $errline) {
    echo "Custom error [$errno]: $errstr on line $errline in file $errfile\n";
    // Log the error details to a file
    file_put_contents('error_log.txt', "Error [$errno]: $errstr in $errfile on line $errline\n", FILE_APPEND);
}

// Set the custom error handler
set_error_handler("customErrorHandler");

try {
    // Simulate an error
    if (!file_exists("somefile.txt")) {
        throw new Exception("File not found!");
    }
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage() . "\n";
    // Log the exception details to a file
    file_put_contents('exception_log.txt', "Exception: " . $e->getMessage() . "\n", FILE_APPEND);
}

// Let's create an error for fun
echo $undefinedVar;

// Remember: Even a shark needs a toothy grin, 
// so give your PHP code a robust error handling bite!
?>