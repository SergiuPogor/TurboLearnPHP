<?php
// Example 1: Using str_split to split a string into equal parts
$string = "abcdefghij";
$chunks = str_split($string, 3); // Split into chunks of 3 characters
echo "Using str_split:\n";
print_r($chunks);

// Example 2: Using explode to split a string by a delimiter
$string = "apple,banana,cherry";
$fruits = explode(",", $string); // Split by comma
echo "Using explode:\n";
print_r($fruits);

// Example 3: Using explode with limit
$string = "apple|banana|cherry|date";
$fruits = explode("|", $string, 3); // Limit the split to 3 parts
echo "Using explode with limit:\n";
print_r($fruits);
?>