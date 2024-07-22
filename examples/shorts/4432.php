// Example of effective error handling in PHP

try {
    // Code that might throw an exception
    $result = 1 / 0; // Division by zero to trigger an exception
} catch (Exception $e) {
    // Handle the exception
    echo "Caught exception: " . $e->getMessage() . "\n";
    
    // Log the exception to a file
    $logFile = fopen('error.log', 'a');
    fwrite($logFile, '[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . "\n");
    fclose($logFile);
}

// Example of error logging function
function logError($message) {
    $logFile = fopen('error.log', 'a');
    fwrite($logFile, '[' . date('Y-m-d H:i:s') . '] ' . $message . "\n");
    fclose($logFile);
}

// Usage of error logging function
logError("Something went wrong in the application.");