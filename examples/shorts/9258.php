<?php
// Example: Choosing between curl_exec and file_get_contents based on request complexity

// Scenario 1: Simple GET request with file_get_contents (suitable for basic API calls)
$url_simple = 'https://jsonplaceholder.typicode.com/posts';
$options_simple = ['http' => ['method' => 'GET', 'timeout' => 10]];
$context_simple = stream_context_create($options_simple);
$response_simple = file_get_contents($url_simple, false, $context_simple);

// Scenario 2: Complex request with curl_exec for precise control over HTTP headers, methods, and timeout
$url_complex = 'https://jsonplaceholder.typicode.com/posts';
$ch = curl_init();

// Set options for the request
curl_setopt_array($ch, [
    CURLOPT_URL => $url_complex,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 10,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Authorization: Bearer YOUR_ACCESS_TOKEN'
    ]
]);

$response_complex = curl_exec($ch);

// Error handling
if ($response_complex === false) {
    $error_msg = curl_error($ch);
    // Log or handle the error
    error_log("cURL error: $error_msg");
}

// Close the curl handle
curl_close($ch);

// Optionally, parse the responses for further processing
$data_simple = json_decode($response_simple, true);
$data_complex = json_decode($response_complex, true);

// Example processing logic for retrieved data
$processed_data = [];
if ($data_simple) {
    foreach ($data_simple as $post) {
        // Simple transformation for demonstration purposes
        $processed_data[] = strtoupper($post['title']);
    }
}
?>