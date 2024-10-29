<?php
// Example: Transforming array data with array_map() vs foreach loop

// Sample data: Prices before tax
$prices = [100, 200, 300, 400];

// Option 1: Using array_map() with an anonymous function to add 20% tax
$pricesWithTax = array_map(fn($price) => $price * 1.2, $prices);
print_r($pricesWithTax); // [120, 240, 360, 480]

// Option 2: Using array_map() with a predefined function
function addTax($price) {
    return $price * 1.2;
}
$pricesWithTaxFunction = array_map('addTax', $prices);
print_r($pricesWithTaxFunction); // [120, 240, 360, 480]

// Option 3: Traditional foreach loop (alternative approach)
$pricesWithTaxLoop = [];
foreach ($prices as $price) {
    $pricesWithTaxLoop[] = $price * 1.2;
}
print_r($pricesWithTaxLoop); // [120, 240, 360, 480]

// Note: array_map() makes code concise and functional, ideal for simple transformations
?>