<?php

// Example using array_diff to get elements in the first array not in the others
$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5, 6];
$result = array_diff($array1, $array2);
print_r($result); // Output: [1, 2]

// Example using array_intersect to get common elements between arrays
$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5, 6];
$result = array_intersect($array1, $array2);
print_r($result); // Output: [3, 4]

// More complex example with multiple arrays
$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5];
$array3 = [4, 6, 7];
$result = array_intersect($array1, $array2, $array3);
print_r($result); // Output: [4]

?>