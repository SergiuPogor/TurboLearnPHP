<?php

// Include the Redis library if you are using Redis for caching
// Make sure to have the Redis extension installed
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// Function to get data with caching
function getCachedData($query) {
    global $redis;
    $cacheKey = md5($query);

    // Check if the result is in cache
    if ($redis->exists($cacheKey)) {
        return json_decode($redis->get($cacheKey), true);
    }

    // Simulate a database call
    $data = fetchFromDatabase($query);

    // Cache the result for 10 minutes
    $redis->set($cacheKey, json_encode($data), 600);

    return $data;
}

// Simulated database fetch function
function fetchFromDatabase($query) {
    // Normally, you'd execute the query and fetch data
    // Here we'll return a dummy array for demonstration
    return [
        'id' => 1,
        'name' => 'Sample Data',
        'query' => $query
    ];
}

// Example usage
$query = "SELECT * FROM users WHERE active = 1";
$result = getCachedData($query);
var_dump($result);

// File caching example (for smaller applications)
function getFileCachedData($filePath, $query) {
    $cacheFile = '/tmp/cache/' . md5($query) . '.json';

    // Check if the cache file exists and is fresh
    if (file_exists($cacheFile) && (filemtime($cacheFile) > (time() - 600))) {
        return json_decode(file_get_contents($cacheFile), true);
    }

    // Fetch data from the database
    $data = fetchFromDatabase($query);

    // Write to cache file
    file_put_contents($cacheFile, json_encode($data));

    return $data;
}

// Using file caching
$fileQuery = "SELECT * FROM products WHERE available = 1";
$fileResult = getFileCachedData('/tmp/cache/', $fileQuery);
var_dump($fileResult);

?>