<?php

// Starting the PHP session
session_start();

// Set a custom header
header('X-Custom-Header: some-value');

// Check if a certain condition is met
if (some_condition()) {
    // Remove the custom header if the condition is true
    header_remove('X-Custom-Header');
}

// Set additional headers
header('Content-Type: application/json');
header('Cache-Control: no-cache');

// Send a response
$response = [
    'status' => 'success',
    'message' => 'Headers processed correctly.',
];

// Output the JSON response
echo json_encode($response);

?>