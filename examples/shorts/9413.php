<?php

class User {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }
}

// Function to demonstrate object cloning
function demonstrateCloning() {
    $user1 = new User("Alice", "alice@example.com");
    
    // Cloning the user1 object
    $user2 = clone $user1;
    
    // Modifying the clone
    $user2->name = "Bob";
    $user2->email = "bob@example.com";
    
    // Display original and cloned object
    echo "User 1: " . $user1->name . " - " . $user1->email . "\n";
    echo "User 2: " . $user2->name . " - " . $user2->email . "\n";
}

demonstrateCloning();

?>