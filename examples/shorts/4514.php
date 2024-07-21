<?php

// Example of using PHP generator to handle large data efficiently

// Generator function to produce numbers
function generateNumbers($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        yield $i;
    }
}

// Usage example: iterate over a large range of numbers
foreach (generateNumbers(1, 1000000) as $number) {
    // Process each number here
    echo $number . PHP_EOL;
}

?>