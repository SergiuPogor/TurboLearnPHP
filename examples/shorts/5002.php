<?php
// Function to merge two nested arrays with array_merge_recursive
function mergeNestedArrays(array $array1, array $array2): array {
    // Merging arrays recursively
    return array_merge_recursive($array1, $array2);
}

// Example usage
$array1 = [
    'a' => ['apple', 'banana'],
    'b' => ['blueberry'],
    'c' => ['carrot']
];

$array2 = [
    'a' => ['apricot'],
    'b' => ['blackberry'],
    'd' => ['date']
];

$mergedArray = mergeNestedArrays($array1, $array2);
print_r($mergedArray);
?>