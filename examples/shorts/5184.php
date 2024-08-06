<?php
// Example of using mt_srand() for seeding the Mersenne Twister random number generator

// Seed the random number generator
mt_srand((int) microtime(true));

// Generate a random integer between 0 and 100
$randomInt = mt_rand(0, 100);

// Output the random integer
echo "Random Integer: " . $randomInt . "\n";

// Example usage in a function
function generateRandomInt(int $min, int $max): int
{
    mt_srand((int) microtime(true));
    return mt_rand($min, $max);
}

// Generate and display a random integer using the function
echo "Random Integer from Function: " . generateRandomInt(1, 50) . "\n";

// Handling file operations with mt_srand()
$file = '/tmp/test.txt';
if (!file_exists($file)) {
    file_put_contents($file, "Random Integer: " . mt_rand(1, 100));
    echo "File created and random integer written.\n";
} else {
    echo "File already exists.\n";
}
?>