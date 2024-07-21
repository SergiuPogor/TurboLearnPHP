// Example of advanced PHP error handling

// Define a custom error handler function
function customErrorHandler($errno, $errstr, $errfile, $errline) {
    // Log the error details
    $logMessage = "Error [$errno]: $errstr in $errfile at line $errline";
    error_log($logMessage);
    
    // Handle specific error types
    switch ($errno) {
        case E_USER_ERROR:
            echo "User Error: $errstr\n";
            break;
        case E_USER_WARNING:
            echo "User Warning: $errstr\n";
            break;
        case E_USER_NOTICE:
            echo "User Notice: $errstr\n";
            break;
        default:
            echo "Unknown Error Type: $errstr\n";
            break;
    }
}

// Set the custom error handler
set_error_handler("customErrorHandler");

// Triggering an error for demonstration
trigger_error("This is a custom error!", E_USER_ERROR);