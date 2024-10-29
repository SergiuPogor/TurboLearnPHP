<?php

// Function to sanitize user input
function sanitizeInput($input) {
    // Remove leading and trailing spaces
    $input = trim($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    // Remove any potential SQL injection attempts
    $input = preg_replace('/[\'"\\;]+/', '', $input);
    
    return $input;
}

// Example user input from a form
$userInput = "  <script>alert('XSS');</script>  ";

// Sanitize the input
$sanitizedInput = sanitizeInput($userInput);

// Output the sanitized result
echo "Sanitized Input: " . $sanitizedInput;

// Array of user inputs for batch processing
$userInputs = [
    "user' OR '1'='1",
    "<b>Bold text</b>",
    "  <img src='x' onerror='alert(1)'>  "
];

// Sanitize each input in the array
$sanitizedInputs = array_map('sanitizeInput', $userInputs);

// Output the sanitized results
foreach ($sanitizedInputs as $input) {
    echo "Sanitized Input: " . $input . "\n";
}

?>