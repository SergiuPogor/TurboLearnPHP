<?php

// Initialize a cURL session
$ch = curl_init();

// Set the URL for the HTTP request
curl_setopt($ch, CURLOPT_URL, "https://api.example.com/data");

// Set the HTTP method to GET
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

// Set headers if required
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer your_api_token",
    "Accept: application/json"
]);

// Set timeout for the request
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// Return the response instead of printing it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request and get the response
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // Decode the JSON response
    $data = json_decode($response, true);
    print_r($data);
}

// Close the cURL session
curl_close($ch);

?>