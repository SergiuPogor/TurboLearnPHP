<?php

// Function to create a JSON response
function createJsonResponse(array $data, int $httpStatus = 200) {
    // Set the content type header
    header('Content-Type: application/json');
    http_response_code($httpStatus);
    
    // Encode the data to JSON format
    $jsonData = json_encode($data);
    
    // Handle JSON encoding errors
    if ($jsonData === false) {
        // Return an error response if encoding fails
        return json_encode([
            'error' => 'JSON encoding error: ' . json_last_error_msg()
        ]);
    }
    
    // Return the JSON response
    return $jsonData;
}

// Example usage of createJsonResponse
$data = [
    'status' => 'success',
    'message' => 'Data fetched successfully',
    'data' => [
        ['id' => 1, 'name' => 'Alice'],
        ['id' => 2, 'name' => 'Bob']
    ]
];

// Output the JSON response
echo createJsonResponse($data);

// Function to handle incoming JSON requests
function handleJsonRequest() {
    // Get the raw input data
    $input = file_get_contents('php://input');
    
    // Decode the JSON data
    $data = json_decode($input, true);
    
    // Check for JSON decoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        return createJsonResponse([
            'error' => 'Invalid JSON: ' . json_last_error_msg()
        ], 400);
    }

    // Process the data (this is where you would handle your logic)
    // For example, simply return the received data
    return createJsonResponse([
        'status' => 'received',
        'data' => $data
    ]);
}

// Uncomment the following line to handle a JSON request
// echo handleJsonRequest();

?>