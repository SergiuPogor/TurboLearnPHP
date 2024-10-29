<?php

// Start a session to manage user data
session_start();

// Set a session variable
$_SESSION['username'] = 'JohnDoe'; 

// Check if session variable is set
if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['username'] . "!";
} else {
    echo "Session not found.";
}

// Function to destroy the session securely
function endSession() {
    // Unset all session variables
    $_SESSION = []; 
    
    // If it's desired to kill the session, also delete the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Finally, destroy the session
    session_destroy(); 
}

// Call the function to end the session securely
endSession();

?>