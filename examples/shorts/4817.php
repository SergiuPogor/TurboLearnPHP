<?php
// Sample JSON data (pretend it's fetched from an API)
$jsonData = '{"name": "John Doe", "email": "john.doe@example.com", "age": 30}';

// Decode JSON data
$data = json_decode($jsonData, true);

// Check for JSON errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON error: " . json_last_error_msg());
}

// Accessing JSON data
echo "Name: " . $data['name'] . PHP_EOL;
echo "Email: " . $data['email'] . PHP_EOL;
echo "Age: " . $data['age'] . PHP_EOL;

// Encoding data back to JSON
$newData = [
    'name' => 'Jane Doe',
    'email' => 'jane.doe@example.com',
    'age' => 25
];

$jsonString = json_encode($newData, JSON_PRETTY_PRINT);

// Check for encoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON encoding error: " . json_last_error_msg());
}

echo $jsonString;

// Humor: JSON strings can be a bit temperamental sometimes!
// Always keep an eye on them, or they might throw a tantrum!
?>