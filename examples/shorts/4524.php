<?php

// Example of PHP Dependency Injection

// Dependency Injection Container
class DIContainer {
    private $services = [];

    // Register a service with the container
    public function register($name, $service) {
        $this->services[$name] = $service;
    }

    // Resolve a service from the container
    public function resolve($name) {
        if (isset($this->services[$name])) {
            return $this->services[$name];
        }
        throw new Exception("Service '$name' not found in container.");
    }
}

// Example class using Dependency Injection
class UserService {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUsers() {
        return $this->db->query('SELECT * FROM users');
    }
}

// Usage of Dependency Injection
$container = new DIContainer();
$db = new Database('localhost', 'username', 'password', 'dbname');
$container->register('Database', $db);
$userService = new UserService($container->resolve('Database'));
$users = $userService->getUsers();
var_dump($users);

?>