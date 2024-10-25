<?php
// Caching with file-based storage in PHP

// Function to read data with caching
function getCachedData($key, $cacheTime = 3600) {
    $cacheFile = __DIR__ . "/cache/{$key}.cache";
    
    // Check if the cache file exists and is still valid
    if (file_exists($cacheFile) && (filemtime($cacheFile) > (time() - $cacheTime))) {
        // Return cached data
        return file_get_contents($cacheFile);
    }
    
    // If no valid cache exists, fetch fresh data
    $data = fetchFreshData($key); // Assume this function fetches data from a database or an API
    
    // Save fresh data to cache
    file_put_contents($cacheFile, $data);
    return $data;
}

// Function to simulate fetching fresh data
function fetchFreshData($key) {
    // Simulate a database query or API call
    // In real scenarios, replace this with actual data retrieval logic
    return "Fresh data for key: {$key} at " . date('Y-m-d H:i:s');
}

// Example usage
$key = 'user_data';
$cachedData = getCachedData($key);
echo $cachedData; // Display the data

// Caching with Memcached
$memcached = new Memcached();
$memcached->addServer('localhost', 11211);

// Set a value in cache with a 1-hour expiration
$memcached->set('user_data', fetchFreshData($key), 3600);

// Get cached value
$memcachedData = $memcached->get('user_data');
if ($memcachedData) {
    echo $memcachedData; // Display the cached data
} else {
    echo "Cache expired or not found. Fetching fresh data.";
}

// Caching with Redis
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// Set a value in cache with a 1-hour expiration
$redis->setex('user_data', 3600, fetchFreshData($key));

// Get cached value
$redisData = $redis->get('user_data');
if ($redisData) {
    echo $redisData; // Display the cached data
} else {
    echo "Cache expired or not found. Fetching fresh data.";
}