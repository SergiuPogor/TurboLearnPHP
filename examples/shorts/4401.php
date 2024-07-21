<?php
// Custom exception handler function
function custom_exception_handler($exception) {
    // Adding humor to our custom error message
    echo "Whoops! An error occurred: " . $exception->getMessage() . "\n";
    // Log the exception details (for real-world use, you would log to a file or monitoring system)
    error_log($exception->getMessage());
}

// Set the custom exception handler
set_exception_handler('custom_exception_handler');

// Example function that throws an exception
function dangerous_function() {
    throw new Exception("Something went wrong, but don't worry, we caught it!");
}

// Call the function to see the custom handler in action
try {
    dangerous_function();
} catch (Exception $e) {
    // Normally you might handle the exception here, but our custom handler will take over
}
?>