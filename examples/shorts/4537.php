<?php

// Example of Dependency Injection in PHP

// Humor: Injecting dependencies like a pro! 💉

// Interface representing a Logger
interface Logger {
    public function log($message);
}

// Concrete implementation of Logger interface
class FileLogger implements Logger {
    public function log($message) {
        echo "Logging message to file: $message\n";
    }
}

// Class with dependency injected via constructor
class UserManager {
    private $logger;

    // Constructor injection
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function registerUser($username) {
        // Business logic
        $this->logger->log("User '$username' registered.");
        echo "User '$username' registered successfully.\n";
    }
}

// Humor: Managing dependencies with style! 🎩

// Usage example
$fileLogger = new FileLogger();
$userManager = new UserManager($fileLogger);

$userManager->registerUser("JohnDoe");

?>