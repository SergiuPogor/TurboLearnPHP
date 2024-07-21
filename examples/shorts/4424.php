// Example of lazy loading in PHP
class Product {
    private $detailsLoaded = false;
    private $details;

    public function getDetails() {
        if (!$this->detailsLoaded) {
            // Simulate loading details from a database or external source
            $this->details = $this->loadDetails();
            $this->detailsLoaded = true;
        }
        return $this->details;
    }

    private function loadDetails() {
        // Simulated function to load details
        return "Product details loaded.";
    }
}

// Usage
$product = new Product();
echo $product->getDetails(); // Details are loaded only when getDetails() is called