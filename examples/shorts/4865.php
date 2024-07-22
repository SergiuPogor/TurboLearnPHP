<?php
// Example of handling undefined index warnings in PHP

// Dynamic array setup
$data = [
    'name' => 'Alice',
    'age' => 30
];

// Check if 'email' index exists before accessing it
if (isset($data['email'])) {
    echo $data['email'];
} else {
    echo 'Email not provided';
}

// Alternative approach using array_key_exists
if (array_key_exists('email', $data)) {
    echo $data['email'];
} else {
    echo 'Email not provided';
}

// Demonstration of advanced error handling
function getArrayValue(array $array, $key, $default = null) {
    return $array[$key] ?? $default;
}

$email = getArrayValue($data, 'email', 'Email not provided');
echo $email;
?>