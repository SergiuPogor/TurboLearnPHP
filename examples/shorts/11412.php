<?php

// Example using array_search() - to find the key of an element
$fruits = ["apple", "banana", "cherry"];
$key = array_search("banana", $fruits);
echo "Key of banana: " . $key; // Output: Key of banana: 1

// Example using in_array() - to check if an element exists
$exists = in_array("banana", $fruits);
echo "Banana exists: " . ($exists ? "Yes" : "No"); // Output: Banana exists: Yes

// Performance comparison: in_array() vs array_search()
$largeArray = range(1, 1000000);

// Using in_array() to check existence
$start = microtime(true);
in_array(500000, $largeArray);
$inArrayTime = microtime(true) - $start;

// Using array_search() to get the key
$start = microtime(true);
array_search(500000, $largeArray);
$arraySearchTime = microtime(true) - $start;

echo "in_array time: $inArrayTime seconds\n";
echo "array_search time: $arraySearchTime seconds\n";

// When you only need to check if an element exists, in_array() is faster.
?>