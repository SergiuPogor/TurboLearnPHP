<?php

// Example of using json_encode and json_decode effectively

// Sample PHP array
$data = [
    'name' => 'Alice',
    'age' => 30,
    'languages' => ['PHP', 'JavaScript', 'Python'],
];

// Convert PHP array to JSON string
$jsonData = json_encode($data);
if ($jsonData === false) {
    // Handle json_encode error
    var_dump('Encoding Error: ' . json_last_error_msg());
}

// Output the JSON string
echo "JSON Data: " . $jsonData . PHP_EOL;

// Convert JSON string back to PHP array
$decodedData = json_decode($jsonData, true); // true for associative array
if (json_last_error() !== JSON_ERROR_NONE) {
    // Handle json_decode error
    var_dump('Decoding Error: ' . json_last_error_msg());
}

// Accessing decoded data
echo "Name: " . $decodedData['name'] . PHP_EOL;
echo "Age: " . $decodedData['age'] . PHP_EOL;

// Using a JSON string with potential errors
$invalidJson = "{'name': 'Bob', 'age': 25}"; // Invalid due to single quotes
$decodedInvalid = json_decode($invalidJson, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    var_dump('Invalid JSON Error: ' . json_last_error_msg());
}

// Example of handling special characters in JSON
$specialData = [
    'message' => 'Hello "World" & welcome!',
];

// Encoding and then decoding
$encodedSpecial = json_encode($specialData);
$decodedSpecial = json_decode($encodedSpecial, true);
echo "Special Message: " . $decodedSpecial['message'] . PHP_EOL;

?>