<?php
// Handling Large Data Efficiently with Generators

function getLines($file) {
    $handle = fopen($file, 'r');
    if (!$handle) {
        yield false;
    }
    while (($line = fgets($handle)) !== false) {
        yield $line;
    }
    fclose($handle);
}

// Example usage
$file = 'prehistoric_budget.txt';
foreach (getLines($file) as $line) {
    echo $line;
    // Imagine analyzing the budget for dinosaur care, one line at a time!
}
?>