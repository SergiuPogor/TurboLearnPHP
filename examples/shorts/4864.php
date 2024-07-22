<?php
// Example of handling duplicate keys with PHP arrays

$array1 = [
    'key1' => 'value1',
    'key2' => 'value2'
];

$array2 = [
    'key1' => 'value1-new',
    'key3' => 'value3'
];

// Merge arrays; duplicates are handled by overwriting values
$mergedArray = array_merge($array1, $array2);

print_r($mergedArray);

// Custom merging strategy to handle duplicate keys
function customArrayMerge($array1, $array2) {
    foreach ($array2 as $key => $value) {
        if (isset($array1[$key])) {
            $array1[$key] = [$array1[$key], $value];
        } else {
            $array1[$key] = $value;
        }
    }
    return $array1;
}

$customMergedArray = customArrayMerge($array1, $array2);

print_r($customMergedArray);
?>