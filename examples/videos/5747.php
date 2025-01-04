<?php

// Function to validate input
function validateInput($input) {
    // Check if all characters are uppercase (ignoring non-alphabetic characters)
    $lettersOnly = preg_replace('/[^A-Z]/', '', $input); // Keep only uppercase letters
    if (ctype_upper($lettersOnly) && strlen($lettersOnly) > 0) {
        return "Valid input: All alphabetic characters are uppercase.";
    } else {
        return "Invalid input: Not all alphabetic characters are uppercase.";
    }
}

// Example inputs to test
$inputs = [
    "HELLO WORLD",    // Valid
    "Hello World",    // Invalid
    "PHP IS GREAT",   // Valid
    "123456",         // Invalid (no letters)
    "PHP",            // Valid
];

// Step through each input and validate
foreach ($inputs as $input) {
    $result = validateInput($input);
    echo "Input: \"$input\" -> $result\n";
}

// Simulate user input from a form in a CLI environment
if (php_sapi_name() === "cli") {
    $userInput = "TEST INPUT"; // Simulated user input for CLI
    $validationResult = validateInput($userInput);
    echo "Simulated User Input: \"$userInput\" -> $validationResult\n";
}

// Additional validation with error handling
try {
    $inputToCheck = "CHECK ME!";
    if (trim($inputToCheck) === '') {
        throw new Exception("Input cannot be empty.");
    }
    echo "Custom Input: \"$inputToCheck\" -> " . validateInput($inputToCheck) . "\n";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . "\n";
}
?>

