<?php

class MagicExample {
    private $data = [];
    private $methods = [];

    // Magic method to handle dynamic properties
    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        echo "No such property: $name\n";
        return null;
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    // Magic method to handle dynamic method calls
    public function __call($name, $arguments) {
        if (array_key_exists($name, $this->methods)) {
            return call_user_func_array($this->methods[$name], $arguments);
        }
        echo "No such method: $name\n";
    }

    public function addMethod($name, $function) {
        $this->methods[$name] = $function;
    }
}

// Example usage
$magic = new MagicExample();

// Adding and accessing dynamic properties
$magic->dynamicProperty = "I'm dynamic!";
echo $magic->dynamicProperty . "\n"; // Outputs: I'm dynamic!

// Adding and calling dynamic methods
$magic->addMethod('dynamicMethod', function($greeting) {
    return "$greeting, world!";
});

echo $magic->dynamicMethod('Hello') . "\n"; // Outputs: Hello, world!

// Adding humor
$magic->dynamicProperty = "I'm magically delicious!";
echo $magic->dynamicProperty . "\n"; // Outputs: I'm magically delicious!
?>