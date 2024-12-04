<?php
// Example 1: Using session_start() to manage user sessions (server-side)
session_start();
$_SESSION['user_id'] = 123;  // Store user data in session
echo "User ID: " . $_SESSION['user_id'];  // Retrieve data

// Example 2: Using setcookie() to manage user sessions (client-side)
$cookie_name = "user_id";
$cookie_value = "123";
$cookie_expiration = time() + 3600;  // 1 hour from now
setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");  // Set cookie

// Check if cookie is set and retrieve the value
if (isset($_COOKIE[$cookie_name])) {
    echo "Cookie Value: " . $_COOKIE[$cookie_name];
} else {
    echo "Cookie is not set.";
}
?>