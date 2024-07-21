<?php

// Example demonstrating PHP sessions vs cookies for data storage

// Starting a session
session_start();

// Storing data in session
$_SESSION['username'] = 'john_doe';

// Setting a cookie with expiration
setcookie('username', 'john_doe', time() + (86400 * 30), '/'); // 30 days

// Retrieving data from session
echo "Session Username: " . $_SESSION['username'] . "\n";

// Retrieving data from cookie
if(isset($_COOKIE['username'])) {
    echo "Cookie Username: " . $_COOKIE['username'] . "\n";
}

?>