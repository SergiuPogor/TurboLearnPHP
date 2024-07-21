<?php
interface LoggerInterface {
    public function log($message);
}

class FileLogger implements LoggerInterface {
    public function log($message) {
        // Simulating writing to a file
        echo "Logging to a file: $message\n";
    }
}

class UserController {
    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function createUser($username) {
        // Simulate user creation
        echo "User $username created successfully!\n";
        $this->logger->log("User $username created.");
    }
}

// Dependency Injection in action
$logger = new FileLogger();
$userController = new UserController($logger);

// Creating a user
$userController->createUser("JohnDoe");

// Adding humor
echo "Who logs the loggers? We do, with Dependency Injection!\n";
?>