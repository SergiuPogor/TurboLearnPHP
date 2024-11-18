<?php
// Example using a 'for' loop to iterate through an indexed array
$numbers = [1, 2, 3, 4, 5];
$start_time = microtime(true);
for ($i = 0; $i < count($numbers); $i++) {
    $value = $numbers[$i]; // Accessing each element
}
$end_time = microtime(true);
echo "For loop time: " . ($end_time - $start_time) . " seconds\n";

// Example using a 'foreach' loop to iterate through an associative array
$people = [
    "John" => 25,
    "Jane" => 30,
    "Alice" => 35
];
$start_time = microtime(true);
foreach ($people as $name => $age) {
    // Accessing each element (key and value)
}
$end_time = microtime(true);
echo "Foreach loop time: " . ($end_time - $start_time) . " seconds\n";
?>