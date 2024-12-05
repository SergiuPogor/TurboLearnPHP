<?php
// Example of gettype
$variable = "Hello World";
echo "The type of the variable is: " . gettype($variable) . "\n";

// Example of var_dump
$variable2 = 42;
var_dump($variable2); // Output type and value

// Example of var_dump for array
$array = ['apple', 'banana', 'cherry'];
var_dump($array);

// Example of using gettype with an array
$var = [1, 2, 3];
echo "The type of the variable is: " . gettype($var) . "\n";

// Performance note: var_dump() can be slower for large datasets
// Large datasets example using var_dump
$largeArray = array_fill(0, 1000000, 'test');
var_dump($largeArray);
?>