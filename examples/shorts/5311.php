<?php

// Example 1: Using pos() to get the current value in an array
$animals = ["lion", "tiger", "bear", "elephant"];
$currentAnimal = pos($animals); // Should return "lion"

// Example 2: Using pos() after moving the array pointer
next($animals); // Move pointer to "tiger"
$currentAnimalNext = pos($animals); // Should return "tiger"

// Example 3: Resetting the pointer and using pos()
reset($animals); // Move pointer back to "lion"
$currentAnimalReset = pos($animals); // Should return "lion"

// Example 4: Combining pos() with custom logic
$values = [10, 20, 30, 40];
while ($value = pos($values)) {
    echo "Current value: " . $value . "\n";
    next($values); // Move to the next value
}
reset($values); // Reset for another process loop
while ($value = pos($values)) {
    echo "Re-processing value: " . $value . "\n";
    next($values); // Move to the next value
}

// Output the results to verify
print_r($currentAnimal);
print_r($currentAnimalNext);
print_r($currentAnimalReset);

?>