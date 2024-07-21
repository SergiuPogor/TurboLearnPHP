// Example demonstrating lazy loading in PHP using a database query

class Product {
    private $productId;
    private $productName;
    private $productDetails; // This property will be lazy-loaded

    public function __construct($productId, $productName) {
        $this->productId = $productId;
        $this->productName = $productName;
    }

    // Method to lazily load product details
    public function getProductDetails() {
        // Check if product details are already loaded
        if (!$this->productDetails) {
            // Simulate fetching product details from a database or external service
            $this->productDetails = "Details for Product ID {$this->productId}: Lorem ipsum dolor sit amet.";
        }
        return $this->productDetails;
    }
}

// Usage example
$product = new Product(1, "Sample Product");
// Product details are not loaded until getProductDetails() is called
echo $product->getProductDetails();