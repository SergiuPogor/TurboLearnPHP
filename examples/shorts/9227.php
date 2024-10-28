<?php
// Example comparing json_encode and serialize in PHP

$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'age' => 30,
    'is_member' => true,
];

// 1. Using json_encode
$jsonData = json_encode($data); // Converts to JSON format
echo "JSON Encoded Data: " . $jsonData . PHP_EOL;

// 2. Using serialize
$serializedData = serialize($data); // Converts to serialized format
echo "Serialized Data: " . $serializedData . PHP_EOL;

// 3. Decoding JSON back to PHP array
$decodedData = json_decode($jsonData, true);
echo "Decoded JSON Data: ";
print_r($decodedData);

// 4. Unserializing back to PHP array
$unserializedData = unserialize($serializedData);
echo "Unserialized Data: ";
print_r($unserializedData);

// Note: json_encode is preferred for data interchange with web clients.