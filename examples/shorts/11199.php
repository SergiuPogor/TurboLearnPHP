<?php
// Example 1: Using $_POST to get form data (not recommended for security)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username']; // Raw user input
    echo "Username: " . htmlspecialchars($username);
}

// Example 2: Using filter_input() to sanitize and validate form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    if ($username === false) {
        echo "Invalid username";
    } else {
        echo "Username: " . htmlspecialchars($username);
    }
}

// Example 3: Using filter_input() with validation (email)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        echo "Invalid email address";
    } else {
        echo "Email: " . htmlspecialchars($email);
    }
}
?>