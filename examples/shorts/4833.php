<?php

// Function to handle unexpected data types gracefully
function handleUnexpectedData($input) {
    // Check if input is a string
    if (is_string($input)) {
        echo "Input is a string: $input\n";
    } 
    // Check if input is an array
    elseif (is_array($input)) {
        echo "Input is an array with " . count($input) . " elements.\n";
    } 
    // Check if input is numeric
    elseif (is_numeric($input)) {
        echo "Input is numeric with value: $input\n";
    } 
    // Handle unexpected data types
    else {
        // Throw an exception for unexpected data types
        throw new InvalidArgumentException("Unexpected data type: " . gettype($input));
    }
}

// Test cases
try {
    handleUnexpectedData("Hello, World!"); // String input
    handleUnexpectedData([1, 2, 3]);       // Array input
    handleUnexpectedData(12345);           // Numeric input
    handleUnexpectedData(12.34);           // Numeric input
    handleUnexpectedData(new stdClass());  // Unexpected input
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>