<?php
// Comparing foreach vs while for performance and use-cases

$data = range(1, 1000000); // Large dataset

// Example 1: Using foreach (easy but adds overhead)
$sumForeach = 0;
foreach ($data as $value) {
    $sumForeach += $value;
}

// Example 2: Using while (efficient for large datasets)
$sumWhile = 0;
reset($data); // Reset the internal pointer
while (($value = current($data)) !== false) {
    $sumWhile += $value;
    next($data); // Move the pointer
}

// Example 3: Using generator to optimize memory in foreach
function generateData(int $max): Generator
{
    for ($i = 1; $i <= $max; $i++) {
        yield $i;
    }
}

$sumGenerator = 0;
foreach (generateData(1000000) as $value) {
    $sumGenerator += $value;
}

// Debug output (for testing purposes only, not to include in production)
file_put_contents('/tmp/test/output.log', json_encode([
    'sumForeach' => $sumForeach,
    'sumWhile' => $sumWhile,
    'sumGenerator' => $sumGenerator
]));
?>