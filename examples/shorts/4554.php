<?php

// Example of PHP generator for efficient memory usage

// Generator function to yield squares of numbers
function generateSquares($n) {
    for ($i = 1; $i <= $n; $i++) {
        yield $i * $i;
    }
}

// Using the generator to iterate through squares
echo "Generating squares up to 10:<br>";
foreach (generateSquares(10) as $square) {
    echo "$square ";
}

?>