<?php
// Example of using mt_getrandmax() to get the maximum value for mt_rand()

// Get the maximum value mt_rand() can generate
$maxValue = mt_getrandmax();

// Output the maximum value
echo "Maximum value of mt_rand(): " . $maxValue . "\n";

// Example usage in a function
function generateRandomInt(int $min, int $max): int
{
    // Ensure the max value is within the mt_rand() range
    $max = min($max, mt_getrandmax());
    return mt_rand($min, $max);
}

// Generate and display a random integer using the function
echo "Random Integer from Function: " . generateRandomInt(10, 500) . "\n";

// Handling file operations with mt_getrandmax()
$file = '/tmp/test.txt';
if (!file_exists($file)) {
    file_put_contents($file, "Max value of mt_rand(): " . mt_getrandmax());
    echo "File created and max value written.\n";
} else {
    echo "File already exists.\n";
}
?>