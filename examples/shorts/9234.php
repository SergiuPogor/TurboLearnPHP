<?php
// Setting a custom session save path
session_save_path('/path/to/custom/session/directory');

// Starting the session
session_start();

// Storing session data
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'JohnDoe';

// Function to retrieve session data safely
function getSessionData($key) {
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    }
    return null; // Return null if not set
}

// Retrieving user information
$userId = getSessionData('user_id');
$username = getSessionData('username');

// Example output (for testing purposes)
echo "User ID: " . htmlspecialchars($userId) . "\n";
echo "Username: " . htmlspecialchars($username) . "\n";