// Example demonstrating PHP traits for code reusability
trait Loggable {
    public function log($message) {
        echo "Logging message: $message\n";
    }
}

class User {
    use Loggable;
    
    public function register() {
        $this->log('User registered');
        // Additional registration logic
    }
}

// Usage example
$user = new User();
$user->register(); // Output: Logging message: User registered