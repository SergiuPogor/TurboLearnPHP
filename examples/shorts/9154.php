<?php
// Starting a session securely
session_start([
    'cookie_lifetime' => 0, // Session lasts until the browser is closed
    'cookie_secure' => true, // Only send cookies over HTTPS
    'cookie_httponly' => true, // Prevent JavaScript access to session cookies
    'cookie_samesite' => 'Strict' // Limit cookie sending to first-party contexts
]);

// Check for session fixation
if (!isset($_SESSION['initialized'])) {
    // Regenerate session ID to prevent fixation
    session_regenerate_id(true);
    $_SESSION['initialized'] = true; // Flag to indicate session has been initialized
}

// Store user data securely
$_SESSION['user_data'] = [
    'username' => 'example_user',
    'roles' => ['admin', 'editor']
];

// Function to check if a user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_data']);
}

// Log out and clear session data
function logout() {
    $_SESSION = []; // Clear the session array
    session_destroy(); // Destroy the session
}

// Example usage
if (isLoggedIn()) {
    echo 'Welcome back, ' . $_SESSION['user_data']['username'];
} else {
    echo 'Please log in.';
}