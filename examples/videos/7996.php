<?php
// validation_example.php

// Function to validate user input using filter_var
function validateUserInput($input) {
    // Validate email address
    if (filter_var($input['email'], FILTER_VALIDATE_EMAIL) === false) {
        return "Invalid email format.";
    }

    // Validate URL
    if (filter_var($input['website'], FILTER_VALIDATE_URL) === false) {
        return "Invalid URL format.";
    }

    // Validate integer
    if (filter_var($input['age'], FILTER_VALIDATE_INT) === false) {
        return "Age must be a valid integer.";
    }

    // All validations passed
    return "Input is valid!";
}

// Example input data
$userInput = [
    'email' => 'test@example.com',
    'website' => 'https://example.com',
    'age' => '25'
];

// Validate the input
$result = validateUserInput($userInput);
echo $result . "\n";

// Example with invalid data
$invalidInput = [
    'email' => 'invalid-email',
    'website' => 'htp://not-a-url',
    'age' => 'not-an-age'
];

// Validate the invalid input
$result = validateUserInput($invalidInput);
echo $result . "\n";

// Function to sanitize input
function sanitizeInput($input) {
    $sanitizedEmail = filter_var($input['email'], FILTER_SANITIZE_EMAIL);
    $sanitizedWebsite = filter_var($input['website'], FILTER_SANITIZE_URL);
    $sanitizedAge = filter_var($input['age'], FILTER_SANITIZE_NUMBER_INT);
    
    return [
        'email' => $sanitizedEmail,
        'website' => $sanitizedWebsite,
        'age' => $sanitizedAge
    ];
}

// Sanitize the input data
$sanitizedData = sanitizeInput($userInput);
print_r($sanitizedData);
?>