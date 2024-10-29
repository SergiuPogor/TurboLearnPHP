<?php
// Set a secure cookie
$cookie_name = "user_preference";
$cookie_value = "dark_mode";
$cookie_lifetime = time() + (86400 * 30); // 30 days

// Set cookie parameters for security
setcookie(
    $cookie_name,
    $cookie_value,
    $cookie_lifetime,
    "/",
    "", // Domain (leave empty for current domain)
    true, // Secure flag
    true  // HttpOnly flag
);

// Using SameSite attribute for CSRF protection
setcookie(
    $cookie_name,
    $cookie_value,
    [
        'expires' => $cookie_lifetime,
        'path' => '/',
        'domain' => '',
        'secure' => true, // Use only over HTTPS
        'httponly' => true, // Not accessible via JavaScript
        'samesite' => 'Strict' // Prevent CSRF
    ]
);

// Example of checking a cookie
if (isset($_COOKIE[$cookie_name])) {
    echo "User preference is: " . htmlspecialchars($_COOKIE[$cookie_name]);
} else {
    echo "Cookie is not set.";
}