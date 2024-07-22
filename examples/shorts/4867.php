<?php
/**
 * Merges two arrays recursively.
 *
 * @param array $array1 The first array.
 * @param array $array2 The second array.
 * @return array The merged array.
 */
function recursiveArrayMerge(array $array1, array $array2): array {
    foreach ($array2 as $key => $value) {
        // If the key exists in both arrays and the value is an array
        if (array_key_exists($key, $array1) && is_array($value) && is_array($array1[$key])) {
            $array1[$key] = recursiveArrayMerge($array1[$key], $value);
        } else {
            // Otherwise, just replace or add the value from the second array
            $array1[$key] = $value;
        }
    }
    return $array1;
}

// Example usage
$array1 = [
    'a' => 1,
    'b' => [
        'x' => 10,
        'y' => 20
    ]
];

$array2 = [
    'b' => [
        'x' => 30,
        'z' => 40
    ],
    'c' => 3
];

$mergedArray = recursiveArrayMerge($array1, $array2);
print_r($mergedArray);

/*
Output:
Array
(
    [a] => 1
    [b] => Array
        (
            [x] => 30
            [y] => 20
            [z] => 40
        )
    [c] => 3
)
*/
?>