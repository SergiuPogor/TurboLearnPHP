// Example PHP code demonstrating Dependency Injection

// Interface defining the dependency
interface LoggerInterface {
    public function log(string $message);
}

// Concrete implementation of the LoggerInterface
class FileLogger implements LoggerInterface {
    public function log(string $message) {
        file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}

// Class using Dependency Injection
class UserManager {
    private $logger;

    // Constructor injection
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function registerUser($username) {
        // Register user logic here
        $this->logger->log("User registered: " . $username);
    }
}

// Usage of Dependency Injection
$fileLogger = new FileLogger();
$userManager = new UserManager($fileLogger);

$userManager->registerUser("JohnDoe");