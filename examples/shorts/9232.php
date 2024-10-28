<?php
// Function to validate email addresses using filter_var
function validateEmail($email) {
    // Check if the email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; // Email is valid
    }
    return false; // Email is invalid
}

// Sample usage
$email = "test@example.com";
if (validateEmail($email)) {
    echo "Valid email: $email";
} else {
    echo "Invalid email: $email";
}

// Another example with user input
$userInputEmail = $_POST['user_email'] ?? '';
if (validateEmail($userInputEmail)) {
    echo "User email is valid!";
} else {
    echo "Please enter a valid email address.";
}