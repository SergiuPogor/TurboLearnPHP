<?php
// Function to validate numeric strings
function isValidNumber($input) {
    return ctype_digit($input);
}

// Sample input strings
$testStrings = [
    "12345",      // Valid
    "12.345",     // Invalid
    "abc123",     // Invalid
    "000001",     // Valid
    "123abc456"   // Invalid
];

// Validate each string
foreach ($testStrings as $string) {
    if (isValidNumber($string)) {
        echo "$string is a valid number.\n";
    } else {
        echo "$string is NOT a valid number.\n";
    }
}

// Example of using the function with user input
$userInput = "04567"; // Simulating user input
if (isValidNumber($userInput)) {
    echo "User input '$userInput' is valid!\n";
} else {
    echo "User input '$userInput' is NOT valid!\n";
}
?>