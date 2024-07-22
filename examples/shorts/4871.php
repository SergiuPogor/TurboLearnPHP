<?php
/**
 * Merges two arrays while handling conflicts and preserving data types.
 *
 * @param array $array1 First array to merge.
 * @param array $array2 Second array to merge.
 * @return array Merged array with conflicts handled.
 */
function mergeArrays(array $array1, array $array2): array {
    // Combine arrays and handle conflicts with array_merge_recursive
    $merged = array_merge_recursive($array1, $array2);

    // Optional: Further process to handle specific merge issues
    foreach ($merged as $key => $value) {
        if (is_array($value)) {
            // Resolve nested array conflicts
            $merged[$key] = array_unique($value);
        }
    }

    return $merged;
}

// Example usage with arrays containing conflicting keys
$array1 = [
    'name' => 'Alice',
    'skills' => ['PHP', 'JavaScript']
];
$array2 = [
    'age' => 30,
    'skills' => ['HTML', 'CSS']
];
$result = mergeArrays($array1, $array2);

print_r($result);

/*
Output:
Array
(
    [name] => Alice
    [skills] => Array
        (
            [0] => PHP
            [1] => JavaScript
            [2] => HTML
            [3] => CSS
        )
    [age] => 30
)
*/
?>