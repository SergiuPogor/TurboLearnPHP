<?php
// Example of using getrandmax() to get the maximum value for rand()

// Get the maximum value rand() can generate
$maxValue = getrandmax();

// Output the maximum value
echo "Maximum value of rand(): " . $maxValue . "\n";

// Example usage in a function
function generateRandomInt(int $min, int $max): int
{
    // Ensure the max value is within the rand() range
    $max = min($max, getrandmax());
    return rand($min, $max);
}

// Generate and display a random integer using the function
echo "Random Integer from Function: " . generateRandomInt(10, 100) . "\n";

// Handling file operations with getrandmax()
$file = '/tmp/test.txt';
if (!file_exists($file)) {
    file_put_contents($file, "Max value of rand(): " . getrandmax());
    echo "File created and max value written.\n";
} else {
    echo "File already exists.\n";
}
?>