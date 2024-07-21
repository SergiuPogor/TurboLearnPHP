// Example demonstrating lazy loading in PHP
class LargeDataset {
    private $data = null;

    // Lazy load the large dataset
    public function getData() {
        if ($this->data === null) {
            // Simulate loading a large dataset
            $this->data = $this->fetchLargeDataset();
        }
        return $this->data;
    }

    private function fetchLargeDataset() {
        // Imagine fetching a very large dataset from a database or API
        return "Large dataset loaded successfully!";
    }
}

// Usage
$dataset = new LargeDataset();
$data = $dataset->getData(); // Only loads the dataset when getData() is called