<?php
// Example of using array_push
$fruits = ["apple", "banana", "cherry"];
array_push($fruits, "date"); // Adds to the end of the array
print_r($fruits);

// Example of using array_unshift
$fruits = ["apple", "banana", "cherry"];
array_unshift($fruits, "date"); // Adds to the beginning of the array
print_r($fruits);

// Performance comparison
$fruits = range(1, 100000);
$start = microtime(true);
array_push($fruits, "new element");
$end = microtime(true);
echo "array_push took: " . ($end - $start) . " seconds\n";

$start = microtime(true);
array_unshift($fruits, "new element");
$end = microtime(true);
echo "array_unshift took: " . ($end - $start) . " seconds\n";
?>