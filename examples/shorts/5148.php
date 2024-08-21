<?php
// Example of using filter_input() to retrieve and sanitize user input

// Retrieve and sanitize 'username' from GET request
$username = filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING);

// Check if 'username' is valid and display it
if ($username) {
    echo "Username: " . htmlspecialchars($username);
} else {
    echo "Invalid or missing username.";
}

// Retrieve and validate 'email' from POST request
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// Check if 'email' is valid and display it
if ($email) {
    echo "Email: " . htmlspecialchars($email);
} else {
    echo "Invalid or missing email.";
}
?>