<?php
// Set a custom timeout for API calls
$timeout = 10; // Timeout in seconds

// Initialize a cURL session
$ch = curl_init("https://api.example.com/data");

// Set options for the cURL transfer
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

// Execute the API call
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    $errorMsg = curl_error($ch);
    echo "cURL error: $errorMsg";
} else {
    // Handle the successful response
    $data = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        // Process the data
        echo "Data retrieved successfully.";
        print_r($data);
    } else {
        echo "Error parsing JSON response.";
    }
}

// Close the cURL session
curl_close($ch);

// To improve performance, consider using asynchronous requests
function fetchDataAsync($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    return curl_exec($ch);
}

// Example of making multiple API calls
$urls = [
    "https://api.example.com/data1",
    "https://api.example.com/data2"
];
$responses = [];

foreach ($urls as $url) {
    $responses[] = fetchDataAsync($url);
}

// Process multiple responses
foreach ($responses as $response) {
    $data = json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        print_r($data);
    } else {
        echo "Error parsing JSON response.";
    }
}
?>