<?php
// Custom error handler function
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log error details
    error_log("Error: [$errno] $errstr in $errfile on line $errline");

    // Display user-friendly message
    echo "<b>Something went wrong!</b> Please try again later.";
    
    // Stop script execution for fatal errors
    if ($errno === E_ERROR) {
        exit();
    }
}

// Set the custom error handler
set_error_handler("customErrorHandler");

// Trigger an error for demonstration
echo $undefinedVariable; // This will trigger a notice level error

// Another example to trigger an error
function divide($a, $b) {
    if ($b == 0) {
        trigger_error("Division by zero error.", E_USER_WARNING);
        return null; // Return null if division fails
    }
    return $a / $b;
}

// Call the function with zero to trigger an error
$result = divide(10, 0);
echo "Result: " . $result;
?>