<?php
// Example using json_encode() to encode an array into JSON format
$data = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
$json = json_encode($data);

// Example using serialize() to serialize an object for PHP-specific storage
class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$person = new Person("Jane", 25);
$serializedPerson = serialize($person);

// Example showing both methods in action
echo "JSON encoded data:\n";
echo $json . "\n";

echo "Serialized object:\n";
echo $serializedPerson . "\n";
?>