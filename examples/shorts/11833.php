<?php
// Using array_map to create a new transformed array
$numbers = [1, 2, 3, 4, 5];
$squaredNumbers = array_map(function($num) {
    return $num * $num;
}, $numbers);

// Using array_walk to modify the original array in place
$names = ["John", "Doe", "Jane", "Smith"];
array_walk($names, function(&$name) {
    $name = strtoupper($name);
});

// Demonstrating different use cases
$prices = [100, 200, 300];
$discountedPrices = array_map(fn($price) => $price * 0.9, $prices); // Create a new discounted array
array_walk($prices, fn(&$price) => $price *= 0.9); // Modify the original array directly

// Output the results
print_r($squaredNumbers);
print_r($names);
print_r($prices);
?>