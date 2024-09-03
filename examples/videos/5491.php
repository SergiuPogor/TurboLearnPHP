<?php

// Example 1: Basic use of json_last_error() to check for JSON decoding errors

$jsonString = '{"name": "John Doe", "email": "john.doe@example.com", "age": 30}'; // Valid JSON

$decodedData = json_decode($jsonString, true);

if (json_last_error() === JSON_ERROR_NONE) {
    echo "Valid JSON data. Name: " . $decodedData['name'] . "\n";
} else {
    echo "JSON Error: " . json_last_error_msg() . "\n";
}

// Example 2: Handling a malformed JSON string with json_last_error()

$invalidJsonString = '{"name": "Jane Doe", "email": "jane.doe@example.com", "age":}'; // Malformed JSON

$decodedInvalidData = json_decode($invalidJsonString, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error detected in JSON: " . json_last_error_msg() . "\n";
    // Additional handling logic if needed
} else {
    echo "No JSON errors detected.\n";
}

// Example 3: Function to decode JSON and check for errors with custom error handling

function decodeJsonWithErrorCheck($jsonString) {
    $data = json_decode($jsonString, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        // Log the error and return a default response
        error_log("JSON Error: " . json_last_error_msg());
        return ['error' => json_last_error_msg()];
    }

    return $data;
}

$anotherInvalidJson = '{"product": "Laptop", "price": 999.99, "stock": }'; // Another malformed JSON example
$result = decodeJsonWithErrorCheck($anotherInvalidJson);
if (isset($result['error'])) {
    echo "Failed to decode JSON: " . $result['error'] . "\n";
} else {
    echo "Product: " . $result['product'] . ", Price: " . $result['price'] . "\n";
}

// Example 4: Using json_last_error() to validate JSON data before further processing

function isValidJson($jsonString) {
    json_decode($jsonString);
    return json_last_error() === JSON_ERROR_NONE;
}

$jsonDataToValidate = '{"username": "tech_guru", "active": true, "roles": ["admin", "editor"]}';

if (isValidJson($jsonDataToValidate)) {
    echo "JSON is valid, proceeding with operations...\n";
    // Proceed with using the JSON data
} else {
    echo "Invalid JSON data. Operation aborted.\n";
}

// Example 5: Comparing multiple JSON strings and handling errors with json_last_error()

$jsonString1 = '{"user": "Alice", "age": 28}';
$jsonString2 = '{"user": "Bob", "age": "thirty"}'; // Invalid age format

$data1 = json_decode($jsonString1, true);
$data2 = json_decode($jsonString2, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error found in second JSON string: " . json_last_error_msg() . "\n";
} else {
    echo "Both JSON strings are valid. You can proceed with data comparison.\n";
}

?>