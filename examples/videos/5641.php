<?php

// Function to validate input and check for control characters
function validateInput($input) {
    // Check if the input contains only control characters
    if (ctype_cntrl($input)) {
        return "Input contains only control characters.";
    }
    
    // Additional validation: Check if input is empty
    if (empty($input)) {
        return "Input cannot be empty.";
    }

    // Sanitize the input by stripping out control characters
    $cleanedInput = preg_replace('/[\x00-\x1F\x7F]/', '', $input);
    
    return "Cleaned Input: " . $cleanedInput;
}

// Example inputs for testing
$testInputs = [
    "Hello, World!",  // Normal string
    "\x01\x02\x03",   // Control characters only
    "",                // Empty input
    "Valid Input\x00" // Contains control character
];

// Validate each input and display the results
foreach ($testInputs as $input) {
    $result = validateInput($input);
    echo "Input: '{$input}' => {$result}\n";
}