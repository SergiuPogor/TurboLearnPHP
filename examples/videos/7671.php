<?php

// Step 1: Install Redis and PHP Redis extension
// Make sure Redis server is running and PHP Redis extension is installed

// Step 2: Configure PHP to use Redis for sessions
ini_set('session.save_handler', 'redis');
ini_set('session.save_path', 'tcp://127.0.0.1:6379');

// Step 3: Start a session
session_start();

// Step 4: Storing session data
$_SESSION['user_id'] = 12345;  // Store user ID
$_SESSION['username'] = 'johndoe';  // Store username
$_SESSION['last_activity'] = time();  // Store last activity time

// Step 5: Custom function to handle session expiration
function isSessionExpired(int $timeout = 1800): bool
{
    if (isset($_SESSION['last_activity']) &&
        (time() - $_SESSION['last_activity']) > $timeout) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy session
        return true; // Session expired
    }
    $_SESSION['last_activity'] = time(); // Update last activity
    return false; // Session active
}

// Check if session is expired
if (isSessionExpired()) {
    echo "Session has expired, please log in again.";
} else {
    echo "Welcome back, " . $_SESSION['username'] . "!";
}

// Step 6: Regenerate session ID to prevent session fixation
session_regenerate_id(true);

// Step 7: Cleanup function to clear old sessions
function cleanupOldSessions(): void
{
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    
    $keys = $redis->keys('PHPREDIS_SESSION:*');
    foreach ($keys as $key) {
        $ttl = $redis->ttl($key);
        if ($ttl < 0) {
            $redis->del($key); // Delete expired sessions
        }
    }
}

// Call cleanup function periodically, e.g., via cron job or scheduled task
cleanupOldSessions();

?>