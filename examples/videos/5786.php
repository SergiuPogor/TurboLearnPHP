<?php

// Function to convert a PHP array to JSON format
function convertArrayToJson($dataArray)
{
    // Encode the array to JSON
    $jsonData = json_encode($dataArray, JSON_PRETTY_PRINT);
    
    // Check for encoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON Encoding Error: " . json_last_error_msg());
    }

    return $jsonData;
}

// Example function to prepare data for an API response
function prepareApiResponse()
{
    // Sample data to encode
    $data = [
        "status" => "success",
        "data" => [
            "id" => 1,
            "name" => "John Doe",
            "email" => "john.doe@example.com",
            "roles" => ["admin", "editor"]
        ],
        "message" => "User details retrieved successfully."
    ];

    return convertArrayToJson($data);
}

// Example usage
try {
    $responseJson = prepareApiResponse();
    
    // Display the JSON response
    echo "JSON Response: " . $responseJson . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

?>