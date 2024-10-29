<?php
// Start a session
session_start();

// Set a session variable
$_SESSION['user_id'] = 123;

// Retrieve session variable
$userId = $_SESSION['user_id'];

// Function to regenerate session ID for security
function secureSession() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_regenerate_id(true); // Prevent session fixation
    }
}

// Call the secure session function
secureSession();

// Display user ID
echo "Current user ID is: " . $userId;

// Example of destroying a session
if (isset($_GET['logout'])) {
    session_destroy();
    echo "Session has been destroyed!";
}
?>