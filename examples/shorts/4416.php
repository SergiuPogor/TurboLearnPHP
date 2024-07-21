<?php

// Example: Using Memcached for PHP Application Caching

// Connect to Memcached server
$memcached = new Memcached();
$memcached->addServer('localhost', 11211);

// Example data to cache
$data = [
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
];

// Set data in Memcached with expiration time (e.g., 3600 seconds = 1 hour)
$memcached->set('cached_data', $data, 3600);

// Retrieve data from Memcached
$cachedData = $memcached->get('cached_data');

if ($cachedData) {
    echo "Cached data retrieved: \n";
    print_r($cachedData);
} else {
    echo "Data not found in cache, retrieving from source...\n";
    // Code to fetch data from original source and store in Memcached
}

?>