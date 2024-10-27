<?php
// Include the Predis library to interact with Redis
require 'vendor/autoload.php';

// Create a Redis client
$redis = new Predis\Client();

// Function to set cache with expiration
function setCache(string $key, $value, int $expiration = 300): void {
    global $redis;
    $redis->set($key, json_encode($value));
    $redis->expire($key, $expiration); // Set expiration in seconds
}

// Function to get cached data
function getCache(string $key) {
    global $redis;
    $data = $redis->get($key);
    return $data ? json_decode($data, true) : null;
}

// Function to cache user session data
function cacheUserSession(int $userId): void {
    $sessionData = [
        'userId' => $userId,
        'loginTime' => time(),
        'permissions' => ['read', 'write']
    ];
    setCache("session:$userId", $sessionData, 600); // Cache for 10 minutes
}

// Example usage
$userId = 1;
cacheUserSession($userId);

// Retrieve cached session data
$cachedSession = getCache("session:$userId");
if ($cachedSession) {
    echo "User ID: " . $cachedSession['userId'] . 
         ", Logged In: " . date('Y-m-d H:i:s', $cachedSession['loginTime']) . 
         ", Permissions: " . implode(", ", $cachedSession['permissions']);
} else {
    echo "No session data found for user ID: $userId";
}

// Function to clear cache for a user session
function clearUserSessionCache(int $userId): void {
    global $redis;
    $redis->del("session:$userId");
}

// Example: Clear cache for the user
clearUserSessionCache($userId);