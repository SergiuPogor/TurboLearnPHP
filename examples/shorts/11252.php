<?php

// Example of json_encode()
$userData = [
    "name" => "Alice",
    "age" => 25,
    "city" => "Berlin"
];

// Convert PHP array to JSON string
$jsonString = json_encode($userData);
echo $jsonString; 
// Output: {"name":"Alice","age":25,"city":"Berlin"}

// Example of json_decode()
$jsonResponse = '{"name":"Bob","age":30,"city":"Paris"}';

// Convert JSON string to PHP array
$decodedData = json_decode($jsonResponse, true);
print_r($decodedData); 
// Output: Array ( [name] => Bob [age] => 30 [city] => Paris )

// Practical Example: Sending and receiving JSON via API

// Convert array to JSON before sending it via an API
$apiData = json_encode($userData);

// Simulate API response
$apiResponse = '{"status":"success","message":"Data received"}';

// Decode JSON response from API
$response = json_decode($apiResponse, true);
echo $response['status']; // Output: success

?>