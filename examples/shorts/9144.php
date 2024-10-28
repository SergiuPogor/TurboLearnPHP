<?php

session_start(); // Initialize the session

// Store user data securely in the session
$_SESSION['user_id'] = 1025; // Unique user identifier
$_SESSION['username'] = 'john_doe';
$_SESSION['user_role'] = 'admin';

// Check user authentication
function isUserLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

// Example function to secure an admin-only page
function restrictToAdmin() {
    if ($_SESSION['user_role'] !== 'admin') {
        header("Location: /access_denied.php"); // Redirect if not admin
        exit;
    }
}

// Destroy session on logout for security
function logout() {
    $_SESSION = []; // Clear session data
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], 
                  $params["secure"], $params["httponly"]);
    }
    session_destroy(); // Destroy the session
}

// Usage examples
if (isUserLoggedIn()) {
    restrictToAdmin(); // Only admins can access this part
}

// After performing tasks, user can log out securely
logout();