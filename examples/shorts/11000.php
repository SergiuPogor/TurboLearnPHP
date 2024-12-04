<?php
// Example 1: Using implode to join array elements
$array = ['apple', 'banana', 'cherry'];
$joinedString = implode(", ", $array); // Joins with comma and space
echo $joinedString . "\n"; // Outputs: apple, banana, cherry

// Example 2: Using join to join array elements (same as implode)
$joinedString = join(" | ", $array); // Joins with pipe and space
echo $joinedString . "\n"; // Outputs: apple | banana | cherry

// Example 3: Using implode with no delimiter (empty string)
$joinedString = implode("", $array); // Joins without any separator
echo $joinedString . "\n"; // Outputs: applebananacherry
?>