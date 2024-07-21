<?php
class Product {
    private $details;

    // Lazy loading the details property
    public function getDetails() {
        if ($this->details === null) {
            // Simulating a time-consuming operation
            $this->details = $this->loadDetails();
        }
        return $this->details;
    }

    private function loadDetails() {
        // Pretend this is a complex and slow database query
        sleep(2); // Simulate delay
        return "Product details loaded after some delay. Isn't this magical?";
    }
}

// Example usage
$product = new Product();

// This will trigger the lazy loading
echo "First call: " . $product->getDetails() . "\n";
// This will use the already loaded details
echo "Second call: " . $product->getDetails() . "\n";

// Adding humor
echo "Look, mom! No more slow loads!\n";
?>