<?php
// Example of PHP array merging issues and solutions

// Arrays to merge
$array1 = [
    'a' => 'apple',
    'b' => 'banana',
    1   => 'one'
];

$array2 = [
    'a' => 'avocado',
    'c' => 'cherry',
    1   => 'two'
];

// Merging arrays with key conflicts
$merged = array_merge($array1, $array2);
print_r($merged);

// Output:
// Array
// (
//     [a] => avocado
//     [b] => banana
//     [1] => two
//     [c] => cherry
// )

// Use array_merge_recursive to handle conflicts in a nested manner
$recursive_merged = array_merge_recursive($array1, $array2);
print_r($recursive_merged);

// Output:
// Array
// (
//     [a] => Array
//         (
//             [0] => apple
//             [1] => avocado
//         )
//     [b] => banana
//     [1] => Array
//         (
//             [0] => one
//             [1] => two
//         )
//     [c] => cherry
// )

// Be cautious with array_merge_recursive as it creates nested arrays for duplicate keys
?>