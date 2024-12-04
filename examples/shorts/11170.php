<?php
// Example using json_encode to send data to a web API
$array = ['name' => 'John', 'age' => 30, 'city' => 'New York'];
$jsonData = json_encode($array); 
// Now, $jsonData can be sent via HTTP request or saved as a JSON file
var_dump($jsonData); 

// Example using serialize to store complex data (including objects) in a database
class User {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}
$user = new User('John', 30);
$serializedData = serialize($user); 
// The serialized data can be stored in a database or a file without losing object data
var_dump($serializedData);

// Example of unserialize to restore the object from the serialized string
$unserializedUser = unserialize($serializedData);
var_dump($unserializedUser); // The object will be restored with its properties intact
?>