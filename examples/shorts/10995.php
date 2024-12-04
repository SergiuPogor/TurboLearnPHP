<?php
// Example using file_get_contents for HTTP request
$url = 'https://jsonplaceholder.typicode.com/posts/1';
$response = file_get_contents($url);

// Example using cURL for HTTP request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$responseCurl = curl_exec($ch);
curl_close($ch);

// Compare performance with microtime
$startTime = microtime(true);
file_get_contents($url); // Use file_get_contents to fetch
$endTime = microtime(true);
echo "file_get_contents took " . ($endTime - $startTime) . " seconds.\n";

$startTime = microtime(true);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url); // Use cURL to fetch
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);
$endTime = microtime(true);
echo "cURL took " . ($endTime - $startTime) . " seconds.\n";

// Real use-case: Fetching a JSON API with custom headers using cURL
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer some-token',
    'Accept: application/json'
]);
$response = curl_exec($ch);
curl_close($ch);
echo "cURL response with headers: $response\n";