<?php

// Example of PHP Caching Strategy using Redis

// Initialize Redis client
$redis = new Redis();
$redis->connect('localhost', 6379);

// Function to retrieve data with caching
function fetchData($key, $redis) {
    $cachedData = $redis->get($key);
    if ($cachedData !== false) {
        return unserialize($cachedData);
    } else {
        // Simulate fetching data from database or API
        $data = fetchDataFromDatabaseOrAPI();

        // Store data in Redis cache
        $redis->set($key, serialize($data), 3600); // Cache for 1 hour

        return $data;
    }
}

// Function to fetch data from database or API (simulated)
function fetchDataFromDatabaseOrAPI() {
    // Simulated function to fetch data
    return [
        'id' => 1,
        'name' => 'John Doe',
        'email' => 'john.doe@example.com'
    ];
}

// Example usage of fetchData function
$key = 'user_profile:1';
$userProfile = fetchData($key, $redis);
var_dump($userProfile);

?>