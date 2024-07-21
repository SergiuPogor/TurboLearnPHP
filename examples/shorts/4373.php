<?php

// Example PHP code demonstrating session regeneration

// Start the session
session_start();

// Check if session needs to be regenerated
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3600) {
    // Regenerate session ID and destroy old session data
    session_regenerate_id(true);
    
    // Update last activity time
    $_SESSION['last_activity'] = time();
}

// Use session variables
$_SESSION['username'] = 'example_user';

// Display a message
echo "Session regenerated and updated successfully!";
?>