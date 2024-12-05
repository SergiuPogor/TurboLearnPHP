<?php
// Example 1: Using implode to join array elements
$array = ['apple', 'banana', 'cherry'];
$string = implode(", ", $array); // Joins with a comma and a space
echo $string; // Outputs: apple, banana, cherry

// Example 2: Using join to join array elements (identical to implode)
$array = ['dog', 'cat', 'fish'];
$string = join(" | ", $array); // Joins with a pipe symbol and a space
echo $string; // Outputs: dog | cat | fish

// Example 3: Using implode in a function to join dynamic data
function joinValues(array $values, string $delimiter): string {
    return implode($delimiter, $values); // More readable
}

$fruits = ['apple', 'orange', 'pear'];
echo joinValues($fruits, " - "); // Outputs: apple - orange - pear

// Example 4: Using join as an alias for implode
$colors = ['red', 'blue', 'green'];
echo join(", ", $colors); // Outputs: red, blue, green
?>