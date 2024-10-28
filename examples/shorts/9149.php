<?php

// Sample JSON data
$jsonData = '{"name": "John", "age": 30, "skills": ["PHP", "JavaScript", "SQL"]}';

// Convert JSON to array
$arrayData = json_decode($jsonData, true); // true for associative array

// Check for JSON errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}

// Accessing data from the array
echo "Name: " . $arrayData['name'] . "\n"; // Outputs: John
echo "Age: " . $arrayData['age'] . "\n"; // Outputs: 30
echo "Skills: " . implode(', ', $arrayData['skills']) . "\n"; // Outputs: PHP, JavaScript, SQL

// Example with a nested JSON structure
$nestedJson = '{"user": {"name": "Alice", "age": 25, "skills": ["Python", "Ruby"]}}';
$nestedArray = json_decode($nestedJson, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}

echo "User Name: " . $nestedArray['user']['name'] . "\n"; // Outputs: Alice
echo "User Age: " . $nestedArray['user']['age'] . "\n"; // Outputs: 25
echo "User Skills: " . implode(', ', $nestedArray['user']['skills']) . "\n"; // Outputs: Python, Ruby