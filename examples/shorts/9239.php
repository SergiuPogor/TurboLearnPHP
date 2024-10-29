<?php
// Define a namespace for the project
namespace MyApp\Models;

// Define a class within the namespace
class User {
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }
}

// Define another namespace
namespace MyApp\Controllers;

// Use the User class from the Models namespace
use MyApp\Models\User;

class UserController {
    public function createUser(string $name): User {
        return new User($name);
    }
}

// Example usage
$controller = new UserController();
$user = $controller->createUser('Alice');
echo $user->getName(); // Output: Alice