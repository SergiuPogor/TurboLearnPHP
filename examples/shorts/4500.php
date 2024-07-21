// Example demonstrating PHP error handling with try-catch block and logging

// Define a function to simulate an operation that may throw an exception
function processUserInput($input) {
    if (empty($input)) {
        throw new Exception("Input cannot be empty.");
    }
    return "Processed: $input";
}

// Use try-catch block to handle exceptions gracefully
try {
    $input = ""; // Example empty input to trigger an exception
    $result = processUserInput($input);
    echo $result;
} catch (Exception $e) {
    // Log the error message and details for debugging
    error_log('Caught exception: ' . $e->getMessage());
    echo "Error: " . $e->getMessage();
}