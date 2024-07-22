<?php

// Example demonstrating exception handling in PHP

// Custom exception class
class CustomException extends Exception {}

// Function to validate user input
function validateInput($input) {
    if (empty($input)) {
        throw new InvalidArgumentException("Input cannot be empty.");
    }
    if (!is_numeric($input)) {
        throw new UnexpectedValueException("Input must be numeric.");
    }
    return true;
}

// Example usage
try {
    $input = $_POST['input']; // Simulating user input
    validateInput($input);
    echo "Input is valid: $input";
} catch (InvalidArgumentException $e) {
    echo "Invalid Argument: " . $e->getMessage();
} catch (UnexpectedValueException $e) {
    echo "Unexpected Value: " . $e->getMessage();
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}