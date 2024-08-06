<?php
// Example of using lcg_value() for generating random floating-point numbers

// Generate a random float between 0 and 1
$randomFloat = lcg_value();

// Output the random float
echo "Random Float: " . $randomFloat . "\n";

// Example usage in a function
function generateRandomFloat(): float
{
    return lcg_value();
}

// Generate and display a random float using the function
echo "Random Float from Function: " . generateRandomFloat() . "\n";

// Handling file operations with lcg_value()
$file = '/tmp/test.txt';
if (!file_exists($file)) {
    file_put_contents($file, "Random Float: " . lcg_value());
    echo "File created and random float written.\n";
} else {
    echo "File already exists.\n";
}
?>