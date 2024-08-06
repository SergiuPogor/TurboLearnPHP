<?php
// Example of using rand() for generating random integers

// Seed the random number generator
srand((int) microtime(true));

// Generate a random integer between 0 and 100
$randomInt = rand(0, 100);

// Output the random integer
echo "Random Integer: " . $randomInt . "\n";

// Example usage in a function
function generateRandomInt(int $min, int $max): int
{
    srand((int) microtime(true));
    return rand($min, $max);
}

// Generate and display a random integer using the function
echo "Random Integer from Function: " . generateRandomInt(1, 50) . "\n";

// Handling file operations with rand()
$file = '/tmp/test.txt';
if (!file_exists($file)) {
    file_put_contents($file, "Random Integer: " . rand(1, 100));
    echo "File created and random integer written.\n";
} else {
    echo "File already exists.\n";
}
?>