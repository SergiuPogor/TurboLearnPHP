<?php
// Comparing count vs sizeof with arrays and Countable objects

// Example 1: Working with a simple array
$data = ['apple', 'banana', 'cherry'];

echo "Using count: " . count($data) . PHP_EOL;
echo "Using sizeof: " . sizeof($data) . PHP_EOL;

// Example 2: Custom class implementing Countable
class ProductCollection implements Countable
{
    private array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function count(): int
    {
        return count($this->products);
    }
}

$products = new ProductCollection(['Laptop', 'Phone', 'Tablet']);

// Using count and sizeof on Countable object
echo "Countable object with count: " . count($products) . PHP_EOL;

// sizeof works but is less readable for objects
echo "Countable object with sizeof: " . sizeof($products) . PHP_EOL;

// Edge Case: sizeof with non-Countable objects (throws error in strict mode)
class NonCountable {}

$nonCountable = new NonCountable();

try {
    echo "NonCountable object with count: " . count($nonCountable) . PHP_EOL;
} catch (Error $e) {
    echo "Error using count: " . $e->getMessage() . PHP_EOL;
}

try {
    echo "NonCountable object with sizeof: " . sizeof($nonCountable) . PHP_EOL;
} catch (Error $e) {
    echo "Error using sizeof: " . $e->getMessage() . PHP_EOL;
}
?>