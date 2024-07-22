<?php

// Example PHP code to handle JSON decode errors effectively

// JSON string with an error (missing a closing brace)
$jsonString = '{"name": "John", "age": 30, "city": "New York"';

// Decode the JSON string
$data = json_decode($jsonString, true);

// Check if json_decode() returned null
if (json_last_error() !== JSON_ERROR_NONE) {
    // Fetch the error message
    $errorMessage = json_last_error_msg();
    
    // Output the error message
    echo "JSON Decode Error: $errorMessage\n";
    
    // Handle the error (logging, throwing exception, etc.)
    // Let's log it for this example
    error_log("JSON Decode Error: $errorMessage");
    
    // Humor: Error messages can be a lifesaver or just ruin your day!
    echo "It's okay, even the best of us miss a closing brace sometimes!\n";
} else {
    // No errors, proceed with the decoded data
    echo "Decoded JSON Data:\n";
    print_r($data);
}

// Just to keep it professional
echo "Remember: Always validate your JSON data!\n";

?>