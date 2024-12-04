<?php
// Example: Using session_start and session_regenerate_id for better session security

// Step 1: Start the session
session_start();

// Step 2: Regenerate session ID to prevent session fixation attacks
if (!isset($_SESSION['initialized'])) {
    $_SESSION['initialized'] = true;
    session_regenerate_id(true); // Regenerate session ID to prevent fixation
}

// Example: A simple login check and regenerate ID on successful login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate a login check
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'securepassword') {
        $_SESSION['user'] = 'admin';
        session_regenerate_id(true); // Regenerate the session ID after login
    }
}

// Step 3: Use session data for user session
if (isset($_SESSION['user'])) {
    echo "Welcome, " . $_SESSION['user'];
}
?>