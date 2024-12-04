<?php
// Example using array_diff
$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5, 6];
$result_diff = array_diff($array1, $array2); // Values in $array1 that are not in $array2
print_r($result_diff); // Outputs: [1, 2]

// Example using array_udiff with a custom comparison function
function compareFunction($a, $b) {
    return $a - $b; // Basic comparison (numeric comparison)
}

$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5, 6];
$result_udiff = array_udiff($array1, $array2, 'compareFunction');
print_r($result_udiff); // Outputs: [1, 2]

// Using array_udiff with a more complex comparison function
function customCompare($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$array1 = ['apple', 'banana', 'cherry'];
$array2 = ['banana', 'cherry', 'date'];
$result_custom_udiff = array_udiff($array1, $array2, 'customCompare');
print_r($result_custom_udiff); // Outputs: ['apple']
?>