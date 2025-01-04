<?php
// This script demonstrates how to use ctype_print() 
// to validate strings for printable characters.

// Sample user input for validation
$userInput = "Hello, World! 123";
$maliciousInput = "Hello\x00World"; // Contains a null byte

// Function to validate and output the result
function validateInput($input) {
    if (ctype_print($input)) {
        echo "Input is valid and contains only printable characters.\n";
    } else {
        echo "Input is invalid: contains non-printable characters.\n";
    }
}

// Validate normal input
echo "Validating normal input:\n";
validateInput($userInput);

// Validate malicious input
echo "\nValidating malicious input:\n";
validateInput($maliciousInput);

// Example with an array of inputs
$inputArray = [
    "Valid input",
    "Another valid input",
    "Invalid\x01input", // Contains a non-printable character
];

// Validate an array of inputs
foreach ($inputArray as $input) {
    echo "\nValidating input from array:\n";
    validateInput($input);
}

// Special case: Check for an empty string
$emptyInput = "";
echo "\nValidating empty input:\n";
validateInput($emptyInput);
?>