<?php
// Asynchronous requests using curl_multi_exec()
// File: /tmp/test/async_requests.php

// Function to perform asynchronous HTTP requests
function fetchUrls(array $urls) {
    $multiHandle = curl_multi_init(); // Initialize the multi handle
    $curlHandles = []; // Array to store individual curl handles

    // Prepare each curl handle
    foreach ($urls as $url) {
        $curl = curl_init($url); // Initialize curl for the URL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
        $curlHandles[] = $curl; // Store the handle
        curl_multi_add_handle($multiHandle, $curl); // Add the handle to the multi handle
    }

    // Execute all queries simultaneously, continue until all are complete
    do {
        $status = curl_multi_exec($multiHandle, $active); // Perform the requests
        curl_multi_select($multiHandle); // Wait for activity on any curl connection
    } while ($active && $status == CURLM_CALL_MULTI_PERFORM);

    // Collect results and close handles
    $results = [];
    foreach ($curlHandles as $curl) {
        $results[] = curl_multi_getcontent($curl); // Get content from each handle
        curl_multi_remove_handle($multiHandle, $curl); // Remove the handle from the multi handle
        curl_close($curl); // Close the individual handle
    }

    curl_multi_close($multiHandle); // Close the multi handle
    return $results; // Return the array of results
}

// Example usage
$urls = [
    'https://jsonplaceholder.typicode.com/posts/1',
    'https://jsonplaceholder.typicode.com/posts/2',
    'https://jsonplaceholder.typicode.com/posts/3'
];

// Fetch asynchronous responses
$responses = fetchUrls($urls);

// Output the responses
foreach ($responses as $response) {
    echo $response . PHP_EOL; // Display each response
}