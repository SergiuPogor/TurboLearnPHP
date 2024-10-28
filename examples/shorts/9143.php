<?php

// Example of using PHP sessions vs cookies

session_start(); // Start session for server-side storage

// 1. Using a session to store sensitive data
$_SESSION['user_id'] = 125; // Store user ID securely
$_SESSION['auth_token'] = bin2hex(random_bytes(16)); // Secure token for user session

// 2. Setting a cookie for non-sensitive data, persisting across sessions
$cookieName = "site_preferences";
$cookieValue = json_encode(['theme' => 'dark', 'language' => 'en']);
setcookie($cookieName, $cookieValue, [
    'expires' => time() + (30 * 24 * 60 * 60), // 30 days expiration
    'path' => '/',
    'secure' => true,  // HTTPS only
    'httponly' => true // Inaccessible to JavaScript
]);

// Function to retrieve session data (safe for sensitive information)
function getSessionData(string $key) {
    return $_SESSION[$key] ?? 'No data';
}

// Function to retrieve cookie data (suitable for non-sensitive information)
function getCookieData(string $name) {
    return isset($_COOKIE[$name]) ? json_decode($_COOKIE[$name], true) : null;
}

// Example usage
$userId = getSessionData('user_id'); // Get user ID from session
$preferences = getCookieData($cookieName); // Get site preferences from cookie

print_r([
    'User ID (Session)' => $userId,
    'Site Preferences (Cookie)' => $preferences
]);