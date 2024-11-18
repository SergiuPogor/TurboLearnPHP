<?php

// Comparing array_walk vs array_map: Real-world Array Modification

// Sample data: List of product prices with taxes
$prices = [
    'item1' => 20.99,
    'item2' => 15.49,
    'item3' => 10.00,
    'item4' => 8.75
];

// 1. Using array_walk to modify the original array by adding a 10% discount
array_walk($prices, function (&$price) {
    $price *= 0.9; // Apply a 10% discount
});
print_r($prices);

// Reset sample data for next example
$prices = [
    'item1' => 20.99,
    'item2' => 15.49,
    'item3' => 10.00,
    'item4' => 8.75
];

// 2. Using array_map to return a new array with VAT added (20%)
$pricesWithVAT = array_map(fn($price) => round($price * 1.2, 2), $prices);
print_r($pricesWithVAT);

// 3. Real-life use-case: Reading product prices from input file and applying discounts
$inputPath = '/tmp/test/input.txt';
if (file_exists($inputPath)) {
    $rawPrices = file($inputPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Converting prices to float and applying a 5% tax using array_map
    $processedPrices = array_map(fn($price) => round($price * 1.05, 2), $rawPrices);

    // Apply additional discount directly using array_walk
    array_walk($processedPrices, fn(&$price) => $price *= 0.95);

    print_r($processedPrices);
}
?>