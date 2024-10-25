<?php
// A sample PHP script for handling JSON responses in an API

function sendJsonResponse($data, $httpStatus = 200) {
    // Set the content type to application/json
    header('Content-Type: application/json');
    http_response_code($httpStatus);
    
    // Encode data to JSON and handle any potential errors
    $json = json_encode($data);
    if ($json === false) {
        // If encoding fails, send an error response
        sendJsonResponse(['error' => 'Failed to encode JSON'], 500);
        return;
    }

    // Output the JSON response
    echo $json;
}

// Sample data for the API response
$data = [
    'status' => 'success',
    'message' => 'Data retrieved successfully',
    'data' => [
        'item1' => 'Value 1',
        'item2' => 'Value 2',
        'item3' => 'Value 3',
    ]
];

// Send the response
sendJsonResponse($data);
?>