<?php
// Example 1: Using array_map to transform array elements
$numbers = [1, 2, 3, 4, 5];
$doubleNumbers = array_map(fn($n) => $n * 2, $numbers); 
// Doubles each number in the array
print_r($doubleNumbers);

// Example 2: Using array_filter to filter array elements
$numbers = [1, 2, 3, 4, 5];
$evenNumbers = array_filter($numbers, fn($n) => $n % 2 === 0); 
// Keeps only even numbers from the array
print_r($evenNumbers);

// Example 3: Real-world example of filtering and mapping
$products = [
    ['name' => 'Laptop', 'price' => 1000],
    ['name' => 'Phone', 'price' => 500],
    ['name' => 'Tablet', 'price' => 300]
];

// Step 1: Use array_filter to get products with price > 400
$filteredProducts = array_filter($products, fn($product) => $product['price'] > 400);

// Step 2: Use array_map to apply a discount on the filtered products
$discountedProducts = array_map(fn($product) => [
    'name' => $product['name'],
    'price' => $product['price'] * 0.9
], $filteredProducts);

print_r($discountedProducts);
?>