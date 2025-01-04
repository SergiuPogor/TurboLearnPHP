<?php

// Function to validate user input for alphanumeric characters
function validateUserInput($input) {
    // Trim the input to remove extra spaces
    $input = trim($input);
    
    // Check if the input is alphanumeric
    if (ctype_alnum($input)) {
        return "Valid input: $input";
    } else {
        return "Invalid input. Only letters and numbers are allowed.";
    }
}

// Sample inputs for testing
$testInputs = [
    "validInput123",
    "invalidInput@!#",
    "anotherValidInput456",
    "123456",
    "!@#$%^&*()"
];

// Iterate through the test inputs and validate them
foreach ($testInputs as $input) {
    echo validateUserInput($input) . PHP_EOL;
}

// More complex example: Validate input from a user form
function validateUserForm(array $formData) {
    foreach ($formData as $key => $value) {
        // Trim whitespace from each input
        $value = trim($value);
        // Validate only alphanumeric characters
        if (!ctype_alnum($value)) {
            echo "Error: Invalid character in $key. Only letters and numbers are allowed." . PHP_EOL;
            return false; // Stop validation on first error
        }
    }
    return true; // All inputs valid
}

// Simulated user form data
$userFormData = [
    'username' => 'user123',
    'password' => 'pass123',
    'email' => 'user@example.com', // This is an invalid field for ctype_alnum
];

// Validate user form data
if (!validateUserForm($userFormData)) {
    echo "Form submission failed due to invalid input." . PHP_EOL;
} else {
    echo "Form submitted successfully." . PHP_EOL;
}