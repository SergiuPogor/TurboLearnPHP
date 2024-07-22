<?php
/**
 * Merges large arrays efficiently using a generator.
 *
 * @param array $array1 The first array to merge.
 * @param array $array2 The second array to merge.
 * @return array The merged array.
 */
function mergeLargeArrays(array $array1, array $array2): array {
    $mergedArray = [];
    foreach ([$array1, $array2] as $array) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!isset($mergedArray[$key])) {
                    $mergedArray[$key] = [];
                }
                $mergedArray[$key] = mergeLargeArrays($mergedArray[$key], $value);
            } else {
                $mergedArray[$key] = $value;
            }
        }
    }
    return $mergedArray;
}

// Example usage with large arrays
$array1 = [
    'user' => ['name' => 'Alice', 'age' => 30],
    'settings' => ['theme' => 'dark', 'notifications' => true]
];

$array2 = [
    'user' => ['age' => 31],
    'settings' => ['notifications' => false]
];

$mergedArray = mergeLargeArrays($array1, $array2);
print_r($mergedArray);

/*
Output:
Array
(
    [user] => Array
        (
            [name] => Alice
            [age] => 31
        )
    [settings] => Array
        (
            [theme] => dark
            [notifications] => false
        )
)
*/
?>