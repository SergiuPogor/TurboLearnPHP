<?php
// Comparing session_start vs setcookie for session management

// Using session_start for built-in session handling
session_start();
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'php_master';

// Retrieving session data
$userID = $_SESSION['user_id'] ?? null;
$username = $_SESSION['username'] ?? null;

// Custom session handling with setcookie
$sessionData = json_encode(['user_id' => 456, 'username' => 'cookie_master']);
setcookie('custom_session', $sessionData, [
    'expires' => time() + 3600, // 1 hour
    'httponly' => true,
    'secure' => true,
    'samesite' => 'Strict',
]);

// Retrieving and decoding custom session data
$customSession = $_COOKIE['custom_session'] ?? null;
if ($customSession) {
    $customSessionData = json_decode($customSession, true);
    $customUserID = $customSessionData['user_id'] ?? null;
    $customUsername = $customSessionData['username'] ?? null;
}

// Comparing outputs
echo "Session via session_start: User ID - $userID, Username - $username" . PHP_EOL;
echo "Session via setcookie: User ID - $customUserID, Username - $customUsername" . PHP_EOL;
?>