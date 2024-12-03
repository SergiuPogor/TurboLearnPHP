<?php

// Using a Trait
trait Logger {
    public function log($message) {
        echo "[LOG]: " . $message . "\n";
    }
}

class User {
    use Logger;  // Reuse the log method from the Logger trait
    
    public function createUser($name) {
        $this->log("Creating user: $name");
    }
}

$user = new User();
$user->createUser("John Doe");

// Using an Interface
interface Loggable {
    public function log($message);
}

class Admin implements Loggable {
    public function log($message) {
        echo "[ADMIN LOG]: " . $message . "\n";
    }
}

$admin = new Admin();
$admin->log("Admin log message");

// Trait allows method reuse directly, Interface enforces method structure

?>