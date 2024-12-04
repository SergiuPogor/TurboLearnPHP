<?php
// Example using file_get_contents for HTTP request
$url = 'https://jsonplaceholder.typicode.com/posts/1';
$response = file_get_contents($url);

// Example using cURL for HTTP request with more control
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$responseCurl = curl_exec($ch);
curl_close($ch);

// Real use-case: Fetching JSON API with custom headers using cURL
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer some-token',
    'Accept: application/json'
]);
$response = curl_exec($ch);
curl_close($ch);
echo "cURL response with headers: $response\n";

// Benchmarking performance for both methods
$startTime = microtime(true);
file_get_contents($url); // Use file_get_contents for fetching data
$endTime = microtime(true);
echo "file_get_contents took " . ($endTime - $startTime) . " seconds.\n";

$startTime = microtime(true);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); // Use cURL for fetching data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
$endTime = microtime(true);
echo "cURL took " . ($endTime - $startTime) . " seconds.\n";