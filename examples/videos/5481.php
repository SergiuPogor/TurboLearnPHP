<?php

// Example 1: Validating an Email Address with preg_match()
$email = "user@example.com";
if (preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/", $email)) {
    echo "Valid email address.";
} else {
    echo "Invalid email address.";
}

// Example 2: Checking if a Username Contains Only Alphanumeric Characters
$username = "user_name123";
if (preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
    echo "Valid username.";
} else {
    echo "Invalid username. Only alphanumeric characters and underscores are allowed.";
}

// Example 3: Password Validation - Must Contain at Least One Number and One Letter
$password = "Password123";
if (preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $password)) {
    echo "Valid password.";
} else {
    echo "Invalid password. Must contain at least one letter, one number, and be at least 8 characters long.";
}

// Example 4: Sanitizing Input Data to Prevent SQL Injection
$user_input = "DROP TABLE users;";
$pattern = "/[^a-zA-Z0-9_\-]/";
$sanitized_input = preg_replace($pattern, "", $user_input);
echo "Sanitized user input: " . $sanitized_input;

// Example 5: Extracting Data from a String with preg_match()
$string = "Order ID: 12345";
if (preg_match("/Order ID: (\d+)/", $string, $matches)) {
    echo "Extracted Order ID: " . $matches[1];
} else {
    echo "No Order ID found.";
}

// Example 6: Validating a Date Format (YYYY-MM-DD)
$date = "2024-08-24";
if (preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
    echo "Valid date format.";
} else {
    echo "Invalid date format. Expected YYYY-MM-DD.";
}

// Example 7: Checking if a File Path is Valid (for Unix-based Systems)
$file_path = "/tmp/test/input.txt";
if (preg_match("/^\/(?:[^\/\0]+\/)*[^\/\0]+$/", $file_path)) {
    echo "Valid file path.";
} else {
    echo "Invalid file path.";
}

// Example 8: Multiple Ways to Validate Phone Numbers
$phone_number = "+1-800-555-0123";
$patterns = [
    "/^\+1-\d{3}-\d{3}-\d{4}$/",    // US Format with country code
    "/^\d{10}$/",                    // Simple 10-digit format
    "/^\(\d{3}\) \d{3}-\d{4}$/"      // US Format with parentheses
];

foreach ($patterns as $pattern) {
    if (preg_match($pattern, $phone_number)) {
        echo "Valid phone number format: " . $pattern;
        break;
    }
}

// Example 9: Validate a ZIP Code (US format)
$zip_code = "12345-6789";
if (preg_match("/^\d{5}(-\d{4})?$/", $zip_code)) {
    echo "Valid ZIP code format.";
} else {
    echo "Invalid ZIP code format.";
}

?>