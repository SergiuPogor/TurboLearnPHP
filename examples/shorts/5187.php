<?php
// Example of using mt_rand() for generating high-quality random integers

// Seed the random number generator with a varying value
mt_srand((int) microtime(true));

// Generate a random integer between 0 and 1000
$randomInt = mt_rand(0, 1000);

// Output the random integer
echo "Random Integer: " . $randomInt . "\n";

// Example usage in a function
function generateRandomInt(int $min, int $max): int
{
    mt_srand((int) microtime(true));
    return mt_rand($min, $max);
}

// Generate and display a random integer using the function
echo "Random Integer from Function: " . generateRandomInt(10, 500) . "\n";

// Handling file operations with mt_rand()
$file = '/tmp/test.txt';
if (!file_exists($file)) {
    file_put_contents($file, "Random Integer: " . mt_rand(1, 1000));
    echo "File created and random integer written.\n";
} else {
    echo "File already exists.\n";
}
?>