<?php
// Asynchronous requests using Guzzle
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

$client = new Client();
$urls = [
    'https://jsonplaceholder.typicode.com/posts/1',
    'https://jsonplaceholder.typicode.com/posts/2',
    'https://jsonplaceholder.typicode.com/posts/3'
];

// Create an array of promises
$promises = [];
foreach ($urls as $url) {
    $promises[] = $client->getAsync($url);
}

// Wait for the requests to complete
$responses = Promise\settle($promises)->wait();

// Process the results
foreach ($responses as $response) {
    if ($response['state'] === 'fulfilled') {
        echo "Response: " . $response['value']->getBody() . PHP_EOL;
    } else {
        echo "Error: " . $response['reason'] . PHP_EOL;
    }
}

// Using cURL for asynchronous requests
$multiHandle = curl_multi_init();
$curlHandles = [];

// Initialize cURL handles
foreach ($urls as $url) {
    $curlHandle = curl_init($url);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
    curl_multi_add_handle($multiHandle, $curlHandle);
    $curlHandles[] = $curlHandle;
}

// Execute all queries simultaneously
$running = null;
do {
    curl_multi_exec($multiHandle, $running);
} while ($running > 0);

// Collect responses
foreach ($curlHandles as $handle) {
    $response = curl_multi_getcontent($handle);
    echo "Response: " . $response . PHP_EOL;
    curl_multi_remove_handle($multiHandle, $handle);
    curl_close($handle);
}

curl_multi_close($multiHandle);
?>