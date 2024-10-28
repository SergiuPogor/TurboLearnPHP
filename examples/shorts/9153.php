<?php
// Example of converting an array to JSON in PHP

// Sample data array
$data = [
    "name" => "John Doe",
    "email" => "john@example.com",
    "age" => 30,
    "hobbies" => ["reading", "coding", "traveling"]
];

// Converting the array to JSON
$jsonData = json_encode($data);

// Checking for errors during encoding
if (json_last_error() !== JSON_ERROR_NONE) {
    // Handle error
    echo 'JSON Encoding Error: ' . json_last_error_msg();
} else {
    // Successful encoding
    echo $jsonData; // Output the JSON string
}

// Example of converting a multi-dimensional array
$multiArray = [
    [
        "id" => 1,
        "task" => "Write PHP code",
        "status" => "completed"
    ],
    [
        "id" => 2,
        "task" => "Learn JSON",
        "status" => "in progress"
    ]
];

$jsonMultiArray = json_encode($multiArray);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'JSON Encoding Error: ' . json_last_error_msg();
} else {
    echo $jsonMultiArray; // Output the multi-dimensional JSON string
}