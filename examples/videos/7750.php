<?php

// Basic Example of session_regenerate_id to Improve Security
session_start(); // Start the session

// Important: Use session_regenerate_id after sensitive actions, such as login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Dummy authentication check
    if ($username === 'user' && $password === 'password') {
        session_regenerate_id(true); // True to delete the old session ID for security

        // Store user data in the session after successful login
        $_SESSION['user'] = $username;
        $_SESSION['logged_in'] = true;
        echo "Session secured and user authenticated!";
    }
}

// Use case: Regenerating the session ID when updating privileges
if (isset($_SESSION['user']) && $_POST['role_change'] === true) {
    session_regenerate_id(true); // Regenerate ID to protect updated session data
    $_SESSION['role'] = $_POST['new_role'];
    echo "Session ID regenerated for role update!";
}

// Advanced Use Case: Periodic ID Regeneration to Further Reduce Risk
$regenTime = 600; // Regenerate ID every 10 minutes for added security

if (!isset($_SESSION['last_regen'])) {
    $_SESSION['last_regen'] = time();
}

if (time() - $_SESSION['last_regen'] > $regenTime) {
    session_regenerate_id(true);
    $_SESSION['last_regen'] = time();
}

// Log out and destroy session with ID regeneration
if (isset($_POST['logout'])) {
    session_regenerate_id(true); // Generate a fresh session ID before destroying
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session data
    echo "Session destroyed and user logged out securely.";
}

// Output user session information for reference
print_r($_SESSION);

?>