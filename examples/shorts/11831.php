<?php
// Using filter_var for validating an email address
$email = "test@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email!";
} else {
    echo "Invalid email!";
}

// Using preg_match for custom regex validation
$username = "user_123";
if (preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    echo "Valid username!";
} else {
    echo "Invalid username!";
}

// Using filter_var for URL validation
$url = "https://example.com";
if (filter_var($url, FILTER_VALIDATE_URL)) {
    echo "Valid URL!";
} else {
    echo "Invalid URL!";
}

// Combining preg_match with filter_var for custom IP validation
$ip = "192.168.0.1";
if (preg_match('/^(\d{1,3}\.){3}\d{1,3}$/', $ip) && filter_var($ip, FILTER_VALIDATE_IP)) {
    echo "Valid IP address!";
} else {
    echo "Invalid IP address!";
}
?>