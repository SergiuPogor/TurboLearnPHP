<?php

class User {
    private $data = [];

    public function __get($name) {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null; // Handle undefined properties gracefully
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
}

$user = new User();
$user->name = "John Doe"; // __set() is called
echo $user->name; // __get() is called

?>