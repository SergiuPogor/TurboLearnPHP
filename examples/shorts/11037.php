<?php

// Example 1: Using get_headers() to fetch headers from a URL
$url = 'https://www.example.com';
$headers = get_headers($url, 1); // Fetch headers as an associative array
print_r($headers);

// Example 2: Using curl_getinfo() with cURL to get headers
$ch = curl_init('https://www.example.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true); // Include headers in the output
$response = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
print_r($info);

// Example 3: Fetching specific header with curl_getinfo()
$ch = curl_init('https://www.example.com');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
echo "HTTP Status Code: " . $info['http_code']; // Accessing the HTTP status code

?>