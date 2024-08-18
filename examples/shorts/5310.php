<?php

// Example 1: Basic usage of current() in a numeric array
$colors = ["red", "green", "blue", "yellow"];
$currentColor = current($colors); // Should return "red"

// Example 2: Using current() in an associative array
$team = [
    'manager' => 'Alice',
    'developer' => 'Bob',
    'designer' => 'Charlie',
    'qa' => 'David'
];
$currentRole = current($team); // Should return 'Alice'

// Example 3: Combining current() with other pointer functions
$fruits = ["apple", "banana", "cherry", "date"];
next($fruits); // Move pointer to "banana"
$currentFruit = current($fruits); // Should return "banana"
end($fruits); // Move pointer to "date"
$currentFruitEnd = current($fruits); // Should return "date"

// Example 4: Resetting the pointer and using current()
reset($fruits); // Move pointer back to "apple"
$currentFruitReset = current($fruits); // Should return "apple"

// Example 5: Custom iterator with current() for processing tasks
$tasks = ['Task 1', 'Task 2', 'Task 3', 'Task 4'];
while (($task = current($tasks)) !== false) {
    echo "Processing: " . $task . "\n";
    next($tasks);
}
reset($tasks); // Reset the pointer for another process loop
while (($task = current($tasks)) !== false) {
    echo "Re-processing: " . $task . "\n";
    next($tasks);
}

// Output the results to verify
print_r($currentColor);
print_r($currentRole);
print_r($currentFruit);
print_r($currentFruitEnd);
print_r($currentFruitReset);

?>