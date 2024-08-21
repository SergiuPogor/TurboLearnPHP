<?php

// Example 1: Basic usage of array_pop() to remove and get the last element
$fruits = ['apple', 'banana', 'cherry'];
$lastFruit = array_pop($fruits);
// $lastFruit now holds 'cherry', and $fruits contains ['apple', 'banana']
print_r($lastFruit);
print_r($fruits);

// Example 2: Using array_pop() in a stack-like structure
$stack = ['first', 'second', 'third'];
while ($item = array_pop($stack)) {
    echo $item . PHP_EOL;
}
// Prints items from 'third' to 'first' in reverse order

// Example 3: Handling edge cases with empty arrays
$emptyArray = [];
$element = array_pop($emptyArray);
// $element will be NULL, and $emptyArray remains empty
print_r($element);
print_r($emptyArray);

// Example 4: Using array_pop() with associative arrays (Note: Only numeric keys are popped)
$assocArray = ['a' => 1, 'b' => 2, 'c' => 3];
$lastValue = array_pop($assocArray);
// $lastValue now holds 3, and $assocArray will have only 'a' => 1, 'b' => 2
print_r($lastValue);
print_r($assocArray);

?>