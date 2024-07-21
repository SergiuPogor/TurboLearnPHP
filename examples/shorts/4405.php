<?php
class Product {
    private $details;
    private $isDetailsLoaded = false;

    public function getDetails() {
        if (!$this->isDetailsLoaded) {
            // Simulating a heavy operation
            $this->details = $this->loadDetails();
            $this->isDetailsLoaded = true;
        }
        return $this->details;
    }

    private function loadDetails() {
        // Simulate a time-consuming database call
        sleep(2); // Adding a delay for realism
        return "Product details loaded with magical speed!";
    }
}

// Example usage
$product = new Product();

// First call triggers lazy loading
echo "First call: " . $product->getDetails() . "\n";
// Subsequent call uses the cached details
echo "Second call: " . $product->getDetails() . "\n";

// Adding humor
echo "The product details load so fast, it's almost like magic!\n";
?>