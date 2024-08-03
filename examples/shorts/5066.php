<?php

// Sample PHP code to demonstrate handling encoding issues with json_encode()

// Define an array with non-UTF-8 data
$data = [
    'name' => 'Jürgen',
    'city' => 'München',
    'message' => "Café\n"
];

// Ensure data is properly encoded to UTF-8
foreach ($data as &$value) {
    if (!mb_check_encoding($value, 'UTF-8')) {
        $value = utf8_encode($value);
    }
}

// Encode the array to JSON, preserving UTF-8 characters
$json = json_encode($data, JSON_UNESCAPED_UNICODE);

if (json_last_error() !== JSON_ERROR_NONE) {
    // Handle JSON encoding error
    echo 'JSON encoding error: ' . json_last_error_msg();
} else {
    // Output the encoded JSON
    echo $json;
}

// Example output: {"name":"Jürgen","city":"München","message":"Café\n"}

?>