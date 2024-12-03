<?php

// Using session to store user data
session_start();

// Store data in session
$_SESSION['username'] = 'john_doe';
$_SESSION['email'] = 'john@example.com';

// Retrieve session data
echo 'Hello, ' . $_SESSION['username'];

// Using cookie to store user data
setcookie('username', 'john_doe', time() + 3600, '/');
setcookie('email', 'john@example.com', time() + 3600, '/');

// Check if cookie is set and retrieve it
if (isset($_COOKIE['username'])) {
    echo 'Hello, ' . $_COOKIE['username'];
}

?>