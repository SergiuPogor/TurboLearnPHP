<?php
// Custom function to merge multidimensional arrays
function mergeArrays(array $arrays) {
    $result = [];

    foreach ($arrays as $array) {
        foreach ($array as $key => $value) {
            if (is_array($value) && isset($result[$key]) && is_array($result[$key])) {
                $result[$key] = mergeArrays([$result[$key], $value]);
            } else {
                $result[$key] = $value;
            }
        }
    }

    return $result;
}

// Example multidimensional arrays
$array1 = [
    'user' => ['name' => 'Alice', 'age' => 25],
    'address' => ['city' => 'Wonderland']
];

$array2 = [
    'user' => ['age' => 26],
    'address' => ['state' => 'Fantasy']
];

// Merge arrays
$merged = mergeArrays([$array1, $array2]);

// Output result
print_r($merged); // Output: Array ( [user] => Array ( [name] => Alice [age] => 26 ) [address] => Array ( [city] => Wonderland [state] => Fantasy ) )
?>