<?php
// Example PHP code demonstrating the use of json_last_error_msg

$data = '{"name": "John Doe", "email": "john.doe@example.com", "age": 30'; // Missing closing brace

$result = json_decode($data, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "JSON Error: " . json_last_error_msg();
} else {
    print_r($result);
}

/*
Output:
JSON Error: Syntax error
*/
?>