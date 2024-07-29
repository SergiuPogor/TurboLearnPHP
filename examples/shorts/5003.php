<?php
// Function to replace values in the first array with values from subsequent arrays
function replaceArrayValues(array $array1, array ...$arrays): array {
    // Using array_replace to merge arrays
    return array_replace($array1, ...$arrays);
}

// Example usage
$array1 = [
    'color' => 'red',
    'size'  => 'large',
    'shape' => 'circle'
];

$array2 = [
    'color' => 'blue',
    'shape' => 'square'
];

$array3 = [
    'size'  => 'medium',
    'shape' => 'triangle'
];

$replacedArray = replaceArrayValues($array1, $array2, $array3);
print_r($replacedArray);
?>