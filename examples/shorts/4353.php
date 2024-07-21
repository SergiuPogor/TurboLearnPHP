<?php
// DRY Principle - Don't Repeat Yourself
// Instead of duplicating code, create a reusable function

// Example scenario: Calculate total price with tax for different products
function calculateTotalPrice($price, $taxRate) {
    return $price + ($price * $taxRate);
}

// Usage in real application
$products = [
    ["name" => "Banana", "price" => 1.2, "taxRate" => 0.07],
    ["name" => "Apple", "price" => 1.5, "taxRate" => 0.07],
    ["name" => "Orange", "price" => 1.3, "taxRate" => 0.07]
];

foreach ($products as $product) {
    $totalPrice = calculateTotalPrice($product['price'], $product['taxRate']);
    echo "Total price for {$product['name']}: \${$totalPrice}\n";
}

// Even when you're tempted to duplicate code, remember:
// A dry code is a happy code!
// P.S. If only drying wet clothes was this easy!
?>