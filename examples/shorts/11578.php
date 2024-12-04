<?php
// Using array_push to add one element
$array = [1, 2, 3];
array_push($array, 4);
print_r($array);

// Using array_merge to combine multiple arrays
$array1 = [1, 2];
$array2 = [3, 4];
$merged = array_merge($array1, $array2);
print_r($merged);

// Using array_push with multiple elements
$array = [1, 2, 3];
array_push($array, 4, 5);
print_r($array);
?>