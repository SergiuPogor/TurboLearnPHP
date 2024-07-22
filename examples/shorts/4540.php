<?php

// Example of using PHP generators for efficient data processing

// Generator function to yield values instead of returning an array
function generateData($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        yield $i;
    }
}

// Example usage of the generator function
foreach (generateData(1, 1000000) as $value) {
    echo $value . PHP_EOL;
}

?>