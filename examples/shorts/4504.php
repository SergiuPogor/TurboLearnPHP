// Example demonstrating the use of PHP traits for code reuse

// Define a trait for logging functionality
trait Logger {
    public function log($message) {
        echo "Logging message: $message\n";
    }
}

// Use the Logger trait in multiple classes
class User {
    use Logger;
    
    public function __construct() {
        $this->log('User object created');
    }
}

class Order {
    use Logger;
    
    public function __construct() {
        $this->log('Order object created');
    }
}

// Create instances and utilize the trait
$user = new User();
$order = new Order();