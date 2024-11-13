<?php

// Example of using session_start and session_regenerate_id for session security

// Starting the session
session_start();

// Generating a new session ID after user login to prevent session fixation attacks
if (!isset($_SESSION['user_logged_in'])) {
    // Simulating user login
    $_SESSION['user_logged_in'] = true;

    // Regenerate session ID to prevent session fixation
    session_regenerate_id(true);
}

// Checking session status
if (isset($_SESSION['user_logged_in'])) {
    echo "User is logged in with a secure session ID.";
} else {
    echo "Session not secure.";
}

// Ending the session (optional, for logout functionality)
session_destroy();

?>