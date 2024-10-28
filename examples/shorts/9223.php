<?php
// Example of avoiding global variables and using alternatives

// Using a function argument instead of a global variable
function calculateTotalPrice(array $items) {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

// Usage example
$shoppingCart = [
    ["name" => "Laptop", "price" => 999.99, "quantity" => 1],
    ["name" => "Headphones", "price" => 199.99, "quantity" => 2],
];
echo "Total Price: " . calculateTotalPrice($shoppingCart) . "\n";

// Using Dependency Injection instead of a global variable
class Logger {
    public function log($message) {
        echo "[LOG] " . $message . "\n";
    }
}

class Checkout {
    private Logger $logger;
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function processOrder(array $order) {
        $this->logger->log("Processing order for " . count($order) . " items.");
        // Process order logic...
    }
}

// Instantiating and using injected dependencies
$logger = new Logger();
$checkout = new Checkout($logger);
$checkout->processOrder($shoppingCart);

// Alternative using Singleton for shared resources
class DatabaseConnection {
    private static ?DatabaseConnection $instance = null;

    private function __construct() {}

    public static function getInstance(): DatabaseConnection {
        if (self::$instance === null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function connect() {
        // Connection logic...
        echo "[Database] Connected\n";
    }
}

// Usage of singleton pattern
$db = DatabaseConnection::getInstance();
$db->connect();