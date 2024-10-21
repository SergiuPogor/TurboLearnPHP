<?php

function validateUserName(string $username): bool {
    // Check if the username contains only alphabetic characters
    return ctype_alpha($username);
}

function validateInput(array $inputs): array {
    $results = [];
    foreach ($inputs as $input) {
        // Validate each input and store the result
        $isValid = validateUserName($input);
        $results[$input] = $isValid ? "Valid" : "Invalid";
    }
    return $results;
}

// Example usage
$usernamesToValidate = [
    "Alice",
    "Bob123", // Invalid due to digits
    "Charlie!",
    "David"
];

$validationResults = validateInput($usernamesToValidate);

// Output the validation results
foreach ($validationResults as $username => $status) {
    echo "Username: $username is $status\n";
}

// Advanced: Validate a string from a file
function validateFromFile(string $filePath): void {
    // Read the content of the file
    $lines = file($filePath, FILE_IGNORE_NEW_LINES);
    $results = validateInput($lines);
    foreach ($results as $line => $status) {
        echo "Line: '$line' is $status\n";
    }
}

// Validate usernames from a text file
validateFromFile('/tmp/test/input.txt');

?>