<?php
// Using array_push
$colors = ["red", "green", "blue"];
array_push($colors, "yellow", "purple"); // Add to the end
print_r($colors);
// Result: ["red", "green", "blue", "yellow", "purple"]

// Using array_unshift
$fruits = ["apple", "banana", "cherry"];
array_unshift($fruits, "grape", "mango"); // Add to the beginning
print_r($fruits);
// Result: ["grape", "mango", "apple", "banana", "cherry"]

// Comparing performance in a large array
$largeArray = range(1, 100000);
$startPush = microtime(true);
array_push($largeArray, 100001); // Add to the end
$endPush = microtime(true);

$startUnshift = microtime(true);
array_unshift($largeArray, 0); // Add to the beginning
$endUnshift = microtime(true);

echo "array_push time: " . ($endPush - $startPush) . " seconds\n";
echo "array_unshift time: " . ($endUnshift - $startUnshift) . " seconds\n";

// The output will likely show array_push as faster due to no reindexing overhead.
?>