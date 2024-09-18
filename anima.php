<?php

// Set HTTP Response Content Type
header('Content-Type: application/json');

// Set HTTP Response Status Code
http_response_code(200);

// Define JSON response
$response = [
    'is_granted' => true,
    'limit' => 999999999,
    'name' => "feature-figma-dev-mode-exports",
    'next_reset_date' => "2024-05-13T00:00:00+00:00",
    'usage' => 1,
];

// Encode data into JSON format
echo json_encode($response);