<?php
// json_encode example
$user = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'is_admin' => true
];

// Convert to JSON
$json_data = json_encode($user);
echo $json_data; // {"name":"John Doe","email":"john@example.com","is_admin":true}

// Store or send this JSON data (e.g., through an API)

// serialize example
$user = new class {
    public $name = 'John Doe';
    public $email = 'john@example.com';
};

// Serialize object
$serialized_data = serialize($user);
echo $serialized_data; // O:8:"anonymous":2:{s:4:"name";s:8:"John Doe";s:5:"email";s:18:"john@example.com";}

// Store or retrieve PHP object with serialized data
?>