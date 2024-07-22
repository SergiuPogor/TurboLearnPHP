<?php
// Start the session
session_start();

// Function to regenerate session ID
function secureSessionStart()
{
    // Check if the session is new or just started
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id(true);
        $_SESSION['initiated'] = true;
    }
}

// Regenerate session ID after user login
function loginUser($username, $password)
{
    // Dummy check for username and password
    if ($username === 'admin' && $password === 'password123') {
        // Store user data in session
        $_SESSION['user'] = $username;
        // Regenerate session ID to prevent fixation
        session_regenerate_id(true);
        return true;
    }
    return false;
}

// Example usage
if (loginUser('admin', 'password123')) {
    echo "Login successful. Session ID regenerated." . PHP_EOL;
} else {
    echo "Login failed. Please check your credentials." . PHP_EOL;
}

// Secure the session on each request
secureSessionStart();

// Display current session ID for demonstration
echo "Current Session ID: " . session_id() . PHP_EOL;

// Just for fun, let's add some humor
if (!isset($_SESSION['user'])) {
    echo "Oops, no user logged in! Who are you?" . PHP_EOL;
} else {
    echo "Hello, " . $_SESSION['user'] . "! Your session is secure." . PHP_EOL;
}
?>