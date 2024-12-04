<?php
// Example 1: Using explode to split a string into an array
$csv_string = "apple,banana,orange";
$fruits = explode(",", $csv_string);  // Splits the string into an array of fruits
print_r($fruits);  // ["apple", "banana", "orange"]

// Example 2: Using implode to join an array into a string
$fruits_array = ["apple", "banana", "orange"];
$fruits_list = implode(", ", $fruits_array);  // Joins the array into a single string
echo $fruits_list;  // "apple, banana, orange"

// Example 3: Using implode and explode together
$sentence = "apple,banana,orange";
$words = explode(",", $sentence);  // Split the sentence into an array
$sentence_back = implode(" & ", $words);  // Join it back with a different separator
echo $sentence_back;  // "apple & banana & orange"
?>