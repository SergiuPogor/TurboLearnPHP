<?php
// Example 1: Using array_push to add elements to the end of an array
$fruits = ["apple", "banana"];
array_push($fruits, "orange", "grape");
print_r($fruits);

// Example 2: Using array_unshift to add elements to the beginning of an array
$fruits = ["apple", "banana"];
array_unshift($fruits, "orange", "grape");
print_r($fruits);

// Example 3: Performance comparison for large arrays
$largeArray = range(1, 10000);
$start = microtime(true);
array_push($largeArray, 10001);
$end = microtime(true);
echo "array_push took " . ($end - $start) . " seconds.\n";

$start = microtime(true);
array_unshift($largeArray, 10001);
$end = microtime(true);
echo "array_unshift took " . ($end - $start) . " seconds.\n";
?>