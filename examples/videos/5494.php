<?php

// Initialize the multi cURL handler
$multiHandle = curl_multi_init();

// Array to hold individual cURL handles
$handles = [];

// Define the URLs for the requests
$urls = [
    'https://api.example.com/data1',
    'https://api.example.com/data2',
    'https://api.example.com/data3'
];

// Create individual cURL handles and add them to the multi handler
foreach ($urls as $index => $url) {
    $handles[$index] = curl_init($url);
    curl_setopt($handles[$index], CURLOPT_RETURNTRANSFER, true);
    curl_multi_add_handle($multiHandle, $handles[$index]);
}

// Execute the handles
$running = null;
do {
    curl_multi_exec($multiHandle, $running);
    // Optionally, use curl_multi_select() to wait for activity on the curl handles
    curl_multi_select($multiHandle);
} while ($running > 0);

// Collect and display the results
foreach ($handles as $index => $handle) {
    $response = curl_multi_getcontent($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    
    echo "Response from URL $index: \n";
    echo "HTTP Status Code: $httpCode\n";
    echo "Response Body: \n$response\n";
    
    // Remove the handle from the multi handler
    curl_multi_remove_handle($multiHandle, $handle);
    curl_close($handle);
}

// Close the multi cURL handler
curl_multi_close($multiHandle);

?>