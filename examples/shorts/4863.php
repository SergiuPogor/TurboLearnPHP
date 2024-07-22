<?php
// Example of using Dependency Injection in PHP

class DatabaseConnection {
    private $host;
    private $user;
    private $password;

    public function __construct($host, $user, $password) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect() {
        // Implementation for connecting to a database
    }
}

class UserRepository {
    private $dbConnection;

    public function __construct(DatabaseConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function getUserById($id) {
        // Use $this->dbConnection to fetch user data
    }
}

// Dependency Injection Container (simplified example)
class Container {
    private $services = [];

    public function set($name, $service) {
        $this->services[$name] = $service;
    }

    public function get($name) {
        return $this->services[$name];
    }
}

// Usage
$container = new Container();
$container->set('db', new DatabaseConnection('localhost', 'user', 'pass'));
$container->set('userRepo', new UserRepository($container->get('db')));

$userRepo = $container->get('userRepo');
$user = $userRepo->getUserById(1);
?>