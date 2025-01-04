<?php

// Example: Using ctype_lower() to validate lowercase strings

// Step 1: Function to validate user input
function validateUsername($username) {
    // Step 2: Check if the username is in lowercase
    if (ctype_lower($username)) {
        return "Valid username: '$username'";
    } else {
        return "Invalid username: '$username'. Must be all lowercase.";
    }
}

// Step 3: Test usernames
$usernames = [
    "validuser",    // Valid
    "InvalidUser",  // Invalid
    "another_one",  // Valid
    "MixedCase",    // Invalid
];

// Step 4: Validate each username
foreach ($usernames as $user) {
    echo validateUsername($user) . "\n";
}

// Step 5: Function to validate a password
function validatePassword($password) {
    // Step 6: Check if the password contains only lowercase letters
    if (ctype_lower($password)) {
        return "Valid password: '$password'";
    } else {
        return "Invalid password: '$password'. Must be all lowercase.";
    }
}

// Step 7: Test passwords
$passwords = [
    "password123",  // Invalid
    "validpassword",// Valid
    "AnotherPass",   // Invalid
];

// Step 8: Validate each password
foreach ($passwords as $pass) {
    echo validatePassword($pass) . "\n";
}

// Step 9: Function to filter lowercase strings from an array
function filterLowercase(array $strings) {
    return array_filter($strings, function($str) {
        return ctype_lower($str);
    });
}

// Step 10: Example usage of filterLowercase function
$inputStrings = ["hello", "World", "php_is_great", "PHP"];
$lowercaseStrings = filterLowercase($inputStrings);

// Step 11: Output filtered lowercase strings
echo "Lowercase strings: " . implode(", ", $lowercaseStrings) . "\n";

?>