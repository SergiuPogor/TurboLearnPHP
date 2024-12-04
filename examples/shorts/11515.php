<?php
// Using array_merge: Overwrite values when keys are the same
$array1 = ['apple' => 'red', 'banana' => 'yellow'];
$array2 = ['apple' => 'green', 'orange' => 'orange'];
$mergedArray = array_merge($array1, $array2);
// $mergedArray = ['apple' => 'green', 'banana' => 'yellow', 'orange' => 'orange']

// Using array_merge_recursive: Preserve duplicate keys by nesting them
$array3 = ['apple' => 'red', 'banana' => 'yellow'];
$array4 = ['apple' => 'green', 'orange' => 'orange'];
$mergedRecursive = array_merge_recursive($array3, $array4);
// $mergedRecursive = ['apple' => ['red', 'green'], 'banana' => 'yellow', 'orange' => 'orange']

// Merging associative arrays with nested arrays
$array5 = ['fruits' => ['apple', 'banana']];
$array6 = ['fruits' => ['orange']];
$mergedAssocRecursive = array_merge_recursive($array5, $array6);
// $mergedAssocRecursive = ['fruits' => ['apple', 'banana', 'orange']]
?>