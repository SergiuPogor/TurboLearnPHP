<?php
// Example 1: Using array_map to transform array elements
$numbers = [1, 2, 3, 4, 5];
$squared = array_map(fn($n) => $n * $n, $numbers);
print_r($squared); // Output: [1, 4, 9, 16, 25]

// Example 2: Using array_filter to filter out even numbers
$numbers = [1, 2, 3, 4, 5, 6];
$evens = array_filter($numbers, fn($n) => $n % 2 == 0);
print_r($evens); // Output: [2, 4, 6]

// Example 3: Performance comparison of array_map and array_filter
$startTime = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    array_map(fn($n) => $n * 2, $numbers);
}
$endTime = microtime(true);
$mapTime = $endTime - $startTime;
echo "array_map took: " . $mapTime . " seconds.";

$startTime = microtime(true);
for ($i = 0; $i < 10000; $i++) {
    array_filter($numbers, fn($n) => $n % 2 == 0);
}
$endTime = microtime(true);
$filterTime = $endTime - $startTime;
echo "array_filter took: " . $filterTime . " seconds.";
?>