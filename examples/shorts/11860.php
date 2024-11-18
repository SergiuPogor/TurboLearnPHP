<?php

// Example 1: Using json_encode for JSON storage
$data = [
    'name' => 'John',
    'age' => 30,
    'is_active' => true
];

// Convert to JSON format
$jsonData = json_encode($data);
file_put_contents('/tmp/test/data.json', $jsonData);

// Example 2: Using serialize for PHP object storage
class User {
    public $name;
    public $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$user = new User('John', 30);

// Serialize object to store in file
$serializedData = serialize($user);
file_put_contents('/tmp/test/user.serialized', $serializedData);

// Example 3: Retrieving and unserializing PHP object
$retrievedData = file_get_contents('/tmp/test/user.serialized');
$unserializedUser = unserialize($retrievedData);
echo "Name: {$unserializedUser->name}, Age: {$unserializedUser->age}";

// Example 4: Retrieving and decoding JSON data
$retrievedJsonData = file_get_contents('/tmp/test/data.json');
$decodedData = json_decode($retrievedJsonData, true);
echo "Name: {$decodedData['name']}, Age: {$decodedData['age']}";
?>