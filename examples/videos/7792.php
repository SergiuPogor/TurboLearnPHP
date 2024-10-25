<?php
class User {
    private string $username;
    private string $email;

    // Constructor to initialize properties
    public function __construct(string $username, string $email) {
        $this->username = $username;
        $this->email = $email;
    }

    // Method to display user info
    public function displayInfo(): void {
        echo "Username: " . htmlspecialchars($this->username) . "\n";
        echo "Email: " . htmlspecialchars($this->email) . "\n";
    }
}

// Example usage
$user1 = new User("john_doe", "john@example.com");
$user1->displayInfo();

// Another instance with different data
$user2 = new User("jane_doe", "jane@example.com");
$user2->displayInfo();

// Demonstrating a default constructor
class Product {
    private string $name;
    private float $price;

    // Default constructor with default values
    public function __construct(string $name = "Unnamed Product", float $price = 0.0) {
        $this->name = $name;
        $this->price = $price;
    }

    public function displayProduct(): void {
        echo "Product Name: " . htmlspecialchars($this->name) . "\n";
        echo "Product Price: $" . number_format($this->price, 2) . "\n";
    }
}

// Using default constructor
$product1 = new Product();
$product1->displayProduct();

// Custom product
$product2 = new Product("Gadget", 49.99);
$product2->displayProduct();
?>