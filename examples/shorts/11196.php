<?php
// Example of using array_merge and array_merge_recursive

// Using array_merge to merge arrays (values overwrite if keys are the same)
$array1 = ['a' => 'apple', 'b' => 'banana'];
$array2 = ['b' => 'blueberry', 'c' => 'cherry'];
$merged = array_merge($array1, $array2); // 'b' is overwritten by 'blueberry'
var_dump($merged);

// Using array_merge_recursive to merge arrays (values are combined into sub-arrays)
$array1 = ['a' => 'apple', 'b' => 'banana'];
$array2 = ['b' => 'blueberry', 'c' => 'cherry'];
$merged_recursive = array_merge_recursive($array1, $array2); 
// 'b' becomes an array with 'banana' and 'blueberry'
var_dump($merged_recursive);

// Example of merging arrays with different types of values
$array1 = ['numbers' => [1, 2]];
$array2 = ['numbers' => [3, 4]];
$merged_recursive = array_merge_recursive($array1, $array2); 
// 'numbers' is merged into an array with [1, 2, 3, 4]
var_dump($merged_recursive);
?>