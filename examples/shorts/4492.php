<?php

// Example class demonstrating the use of __get and __set magic methods
class DynamicProperties {
    private $data = [];

    // Magic method __get to retrieve inaccessible properties dynamically
    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            throw new Exception("Property $name does not exist.");
        }
    }

    // Magic method __set to set values to inaccessible properties
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

// Usage example
$obj = new DynamicProperties();
$obj->exampleProperty = "Hello, PHP Magic Methods!";
echo $obj->exampleProperty; // Output: Hello, PHP Magic Methods!

// Trying to access a non-existing property will throw an exception
// Uncomment to see the Exception in action
// echo $obj->nonExistingProperty;