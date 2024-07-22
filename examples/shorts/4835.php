<?php

// Array with some values
$data = [
    'name' => 'John',
    'age' => 30
];

// Safely access array elements
echo isset($data['name']) ? $data['name'] : 'Name not set'; // Outputs: John
echo "\n";
echo isset($data['email']) ? $data['email'] : 'Email not set'; // Outputs: Email not set

// Using array_key_exists for checking index existence
if (array_key_exists('age', $data)) {
    echo "Age: " . $data['age']; // Outputs: Age: 30
} else {
    echo "Age key not found";
}

?>