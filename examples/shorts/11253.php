<?php
// Comparing foreach vs while in PHP

// Example 1: Using foreach for arrays
$products = ['Laptop', 'Phone', 'Tablet'];

foreach ($products as $index => $product) {
    echo "Product {$index}: {$product}" . PHP_EOL;
}

// Example 2: Using while with dynamic data
$handle = fopen('/tmp/test/input.txt', 'r');

while (($line = fgets($handle)) !== false) {
    echo "Line: " . trim($line) . PHP_EOL;
}

fclose($handle);

// Example 3: Iterating with a manual index in while
$numbers = [10, 20, 30, 40];
$i = 0;

while ($i < count($numbers)) {
    echo "Number: " . $numbers[$i] . PHP_EOL;
    $i++;
}

// Example 4: Using foreach for structured arrays
$data = [
    ['id' => 1, 'name' => 'Alice'],
    ['id' => 2, 'name' => 'Bob']
];

foreach ($data as $item) {
    echo "ID: {$item['id']}, Name: {$item['name']}" . PHP_EOL;
}
?>