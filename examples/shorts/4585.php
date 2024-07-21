<?php

// Example: Using PHP generator for memory-efficient data processing
function generateNumbers($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        yield $i;
    }
}

// Example usage:
foreach (generateNumbers(1, 1000000) as $number) {
    // Process each number
}

// Example: Using PHP array for small dataset
$colors = ["red", "green", "blue"];

foreach ($colors as $color) {
    echo "Color: " . $color . "<br>";
}