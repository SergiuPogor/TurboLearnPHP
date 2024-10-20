<?php
// Set the seed for reproducibility
mt_srand(time());

// Generate a random number using mt_rand
$randomNumber = mt_rand(1, mt_getrandmax());
echo "Random Number: " . $randomNumber . "\n";

// Function to generate an array of unique random numbers
function generateUniqueRandomNumbers($count, $min, $max) {
    $numbers = [];
    
    // Ensure we do not exceed the range of unique numbers
    if ($count > ($max - $min + 1)) {
        throw new Exception("Count exceeds the range of unique numbers.");
    }

    while (count($numbers) < $count) {
        $random = mt_rand($min, $max);
        // Add unique numbers only
        if (!in_array($random, $numbers)) {
            $numbers[] = $random;
        }
    }
    
    return $numbers;
}

// Generate 5 unique random numbers between 1 and 100
try {
    $uniqueNumbers = generateUniqueRandomNumbers(5, 1, 100);
    echo "Unique Random Numbers: " . implode(", ", $uniqueNumbers) . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Function to generate random floats
function generateRandomFloats($count, $min, $max) {
    $floats = [];
    
    for ($i = 0; $i < $count; $i++) {
        // Generate a random float
        $floats[] = mt_rand() / mt_getrandmax() * ($max - $min) + $min;
    }

    return $floats;
}

// Generate 3 random float numbers between 1 and 10
$randomFloats = generateRandomFloats(3, 1, 10);
echo "Random Float Numbers: " . implode(", ", $randomFloats) . "\n";

// Show the max random value
echo "Maximum Random Value: " . mt_getrandmax() . "\n";
?>