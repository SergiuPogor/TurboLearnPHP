<?php

// Example: Using filter_input for sanitizing and validating user input
$userInput = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($userInput === false) {
    echo "Invalid email address provided.";
} else {
    echo "Email address is valid: " . htmlspecialchars($userInput);
}

// Example: Using validate_input for ensuring data meets specific criteria
function validateInput($input) {
    if (preg_match('/^\d{3}-\d{3}-\d{4}$/', $input)) {
        return true;
    } else {
        return false;
    }
}

$inputData = "123-456-7890";
if (validateInput($inputData)) {
    echo "Input data is valid: " . htmlspecialchars($inputData);
} else {
    echo "Input data does not meet criteria.";
}