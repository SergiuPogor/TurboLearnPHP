<?php
// Fixing session expiration issues in PHP

// Start session
session_start();

// Check if session is valid
if (!isset($_SESSION['user_id'])) {
    // Handle invalid session
    echo "Session expired or not set.";
    exit();
}

// Set session timeout duration (in seconds)
$timeout_duration = 600; // 10 minutes

// Check last activity time
if (isset($_SESSION['LAST_ACTIVITY']) &&
    (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration)) {
    // Last activity was more than timeout duration, expire session
    session_unset(); // Clear session variables
    session_destroy(); // Destroy session
    echo "Session has expired due to inactivity.";
    exit();
}

// Update last activity time
$_SESSION['LAST_ACTIVITY'] = time(); // Update last activity timestamp

// Example of storing session data
$_SESSION['user_id'] = 1; // Example user ID
$_SESSION['user_name'] = 'JohnDoe'; // Example user name

// Regular session management example
function regenerateSession() {
    if (session_id()) {
        session_regenerate_id(true); // Regenerate session ID
    }
}

// Call function to regenerate session ID
regenerateSession();

// Display session data
echo "Welcome, " . $_SESSION['user_name'] . "!";