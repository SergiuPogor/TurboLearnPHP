<?php

// Example of PHP caching with Memcached

// Initialize Memcached
$memcached = new Memcached();
$memcached->addServer('localhost', 11211);

// Example function to fetch data with caching
function fetchData($key) {
    global $memcached;

    // Attempt to fetch data from Memcached
    $data = $memcached->get($key);

    if (!$data) {
        // Data not found in cache, retrieve from database or API
        $data = fetchFromDatabaseOrAPI($key);

        // Store data in Memcached with expiration time (e.g., 1 hour)
        $memcached->set($key, $data, 3600);
    }

    return $data;
}

// Example usage
$key = 'user_profile_123';
$userProfile = fetchData($key);
var_dump($userProfile);

?>