<?php
// Using explode() to split a string by a delimiter
$string = "apple,banana,cherry";
$fruits = explode(",", $string);

// Using str_split() to split a string into chunks of a fixed length
$string = "applebanana";
$chunks = str_split($string, 5);

// Example showing both methods in action
echo "Using explode():\n";
print_r($fruits);

echo "Using str_split():\n";
print_r($chunks);
?>