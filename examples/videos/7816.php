<?php
// Enable OPcache for faster script execution
ini_set('opcache.enable', '1'); 
ini_set('opcache.memory_consumption', '128'); 
ini_set('opcache.interned_strings_buffer', '8'); 
ini_set('opcache.max_accelerated_files', '10000'); 
ini_set('opcache.revalidate_freq', '2'); 

// Function to cache data using Memcached
function cacheDataWithMemcached(string $key, $value): void {
    $memcached = new Memcached();
    $memcached->addServer('localhost', 11211);
    $memcached->set($key, $value, 300); // Cache for 5 minutes
}

// Function to retrieve data from Memcached
function getCachedData(string $key) {
    $memcached = new Memcached();
    $memcached->addServer('localhost', 11211);
    return $memcached->get($key);
}

// Example usage
$dataKey = 'user_data';
$userData = getCachedData($dataKey);

if ($userData === false) {
    // Simulate a database query
    $userData = ['name' => 'John Doe', 'email' => 'john@example.com'];
    cacheDataWithMemcached($dataKey, $userData);
}

// Output user data
echo "Name: " . $userData['name'] . ", Email: " . $userData['email'];

// Using Redis for caching
function cacheDataWithRedis(string $key, $value): void {
    $redis = new Redis();
    $redis->connect('localhost', 6379);
    $redis->set($key, json_encode($value), 300); // Cache for 5 minutes
}

// Function to retrieve data from Redis
function getRedisData(string $key) {
    $redis = new Redis();
    $redis->connect('localhost', 6379);
    return json_decode($redis->get($key), true);
}

// Example usage with Redis
$redisKey = 'session_data';
$sessionData = getRedisData($redisKey);

if ($sessionData === null) {
    // Simulate session data retrieval
    $sessionData = ['user_id' => 1, 'token' => 'abc123'];
    cacheDataWithRedis($redisKey, $sessionData);
}

// Output session data
echo "User ID: " . $sessionData['user_id'] . ", Token: " . $sessionData['token'];