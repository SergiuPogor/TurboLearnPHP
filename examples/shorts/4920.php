<?php

// Function to split a string and process each character
function processCharacters(string $input): array {
    $characters = str_split($input);
    $result = [];
    foreach ($characters as $char) {
        // Example processing: Convert to uppercase and store
        $result[] = strtoupper($char);
    }
    return $result;
}

// Example: Generating a unique token by splitting and manipulating
function generateUniqueToken(string $baseString): string {
    $parts = str_split($baseString, 4); // Split into chunks of 4 characters
    $uniqueToken = implode('-', $parts); // Join chunks with a dash
    return $uniqueToken;
}

// Example usage
$inputString = "hello world!";
$processed = processCharacters($inputString);
echo "Processed Characters: " . implode('', $processed) . PHP_EOL; // Output: HELLO WORLD!

$baseString = "abcdefghijk";
$token = generateUniqueToken($baseString);
echo "Generated Token: " . $token . PHP_EOL; // Output: abcd-efgh-ijkl

// Example: Validating a format by splitting
function validateFormat(string $input, int $length): bool {
    $parts = str_split($input, $length);
    foreach ($parts as $part) {
        if (strlen($part) !== $length) {
            return false;
        }
    }
    return true;
}

$inputFormat = "12345678";
$isValid = validateFormat($inputFormat, 4);
echo $isValid ? "Valid Format" : "Invalid Format"; // Output: Invalid Format

?>