<?php
// Comparing array_push vs array_unshift in PHP

$data = ['apple', 'banana', 'cherry'];

// Example 1: Using array_push (Add to the end)
array_push($data, 'date', 'elderberry');

// Example 2: Using array_unshift (Add to the beginning)
array_unshift($data, 'fig', 'grape');

// Example 3: Optimizing for loops with array_push
$numbers = [];
for ($i = 0; $i < 100000; $i++) {
    array_push($numbers, $i);
}

// Example 4: Using array_unshift with caution (large data)
$largeArray = range(1, 100000);
array_unshift($largeArray, 'start'); // Performance hit due to reindexing

// Example 5: Alternative to array_unshift for performance
function prependToArray(array $array, $value): array
{
    return array_merge([$value], $array);
}

$optimizedArray = prependToArray($data, 'kiwi');

// Write all arrays to file for debugging
file_put_contents('/tmp/test/output.json', json_encode([
    'data' => $data,
    'numbers' => $numbers,
    'largeArraySample' => array_slice($largeArray, 0, 5),
    'optimizedArray' => $optimizedArray
], JSON_PRETTY_PRINT));
?>