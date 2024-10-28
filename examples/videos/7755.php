<?php
// Define a sample class
class User {
    public $name;
    public $email;
    private $password; // Private property

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}

// Create an instance of the User class
$user = new User("Jane Doe", "jane@example.com", "securepassword");

// Method 1: Type Casting
$arrayFromObject1 = (array) $user;

// Method 2: json_encode and json_decode
$arrayFromObject2 = json_decode(json_encode($user), true);

// Displaying the results
echo "Using Type Casting:\n";
print_r($arrayFromObject1);

echo "\nUsing json_encode and json_decode:\n";
print_r($arrayFromObject2);

// Method 3: Custom function to handle private properties
function objectToArray($obj) {
    $reflection = new ReflectionObject($obj);
    $array = [];
    foreach ($reflection->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($obj);
    }
    return $array;
}

// Convert using the custom function
$arrayFromObject3 = objectToArray($user);

echo "\nUsing Reflection to Access Private Properties:\n";
print_r($arrayFromObject3);
?>