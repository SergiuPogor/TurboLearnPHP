<?php

// Example demonstrating PHP generator vs array for memory efficiency

// Generator function to yield squares of numbers
function generateSquares($limit) {
    for ($i = 1; $i <= $limit; $i++) {
        yield $i * $i;
    }
}

// Using the generator to iterate over squares without loading all into memory
echo "Using Generator:\n";
foreach (generateSquares(5) as $square) {
    echo "$square\n";
}

// Using array to store squares
echo "Using Array:\n";
$squares = [];
for ($i = 1; $i <= 5; $i++) {
    $squares[] = $i * $i;
}
foreach ($squares as $square) {
    echo "$square\n";
}

?>