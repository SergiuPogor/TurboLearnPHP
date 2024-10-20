<?php

// Real-world example: debugging JSON decoding using json_last_error_msg()

// Scenario 1: Decoding invalid JSON from an API response
$invalidJson = '{"name": "John Doe", "age": 30, "email": "john.doe@@example.com"'; // missing closing brace

// Decode the JSON
$data = json_decode($invalidJson, true);

// Check for JSON errors
if ($data === null) {
    // Display human-readable error message
    echo "JSON Error: " . json_last_error_msg() . "\n"; 
}

// Scenario 2: Encoding invalid data (e.g., PHP resource)
$invalidData = ['name' => 'Jane Doe', 'handle' => curl_init()]; // Curl resource can't be encoded

// Attempt to encode
$jsonData = json_encode($invalidData);

// Check for encoding errors
if ($jsonData === false) {
    echo "JSON Encoding Error: " . json_last_error_msg() . "\n";
}

// Scenario 3: Secure API data handling with better error detection

function decodeApiResponse($jsonResponse) {
    $data = json_decode($jsonResponse, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("API Response Error: " . json_last_error_msg());
    }

    return $data;
}

try {
    $apiResponse = '{"status": "success", "data": {"id": 101, "name": "Alice"}'; // Simulate broken JSON
    $decodedData = decodeApiResponse($apiResponse);
} catch (Exception $e) {
    echo $e->getMessage();
}

// Scenario 4: Detecting and logging JSON errors during file import
$filePath = '/tmp/test/input.txt'; // Assume the file contains JSON data
$jsonFileContent = file_get_contents($filePath);
$importData = json_decode($jsonFileContent, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('Failed to decode JSON from file: ' . json_last_error_msg());
}

// Scenario 5: Multiple ways to handle JSON errors
$invalidJsonData = '["apple", "banana", "orange", ]'; // Extra comma causes a syntax error

$data = json_decode($invalidJsonData, true);

// Method 1: Using json_last_error_msg()
if ($data === null) {
    echo "Method 1 - Error: " . json_last_error_msg() . "\n";
}

// Method 2: Using json_last_error() with custom handling
if (json_last_error() !== JSON_ERROR_NONE) {
    switch (json_last_error()) {
        case JSON_ERROR_SYNTAX:
            echo "Syntax error, malformed JSON.\n";
            break;
        case JSON_ERROR_UTF8:
            echo "Malformed UTF-8 characters, possibly incorrectly encoded.\n";
            break;
        // Add more cases as needed
        default:
            echo "Unknown JSON error.\n";
    }
}

?>