<?php
// Traits in PHP
// Reuse methods across different classes without duplication or inheritance

trait Logger {
    public function log($message) {
        echo "Logging message: $message\n";
    }
}

class User {
    use Logger;

    public function createUser($name) {
        $this->log("User $name created.");
    }
}

class Order {
    use Logger;

    public function createOrder($orderNumber) {
        $this->log("Order $orderNumber created.");
    }
}

// Usage in real application
$user = new User();
$user->createUser('Alice');

$order = new Order();
$order->createOrder('12345');

// With great power comes great responsibility!
// P.S. Even PHP wants to be DRY (Don't Repeat Yourself)!
?>