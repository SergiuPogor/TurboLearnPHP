<?php

// Example demonstrating PHP garbage collection and memory management

// Define a class
class MyClass {
    public function __construct() {
        echo "Object created.\n";
    }
    public function __destruct() {
        echo "Object destroyed.\n";
    }
}

// Create objects
$obj1 = new MyClass();
$obj2 = new MyClass();

// Unset one object
unset($obj1);

// Force garbage collection (optional in PHP, just for demonstration)
gc_collect_cycles();

echo "End of script.\n";

?>