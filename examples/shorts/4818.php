<?php
/**
 * Function to flatten a multidimensional array
 *
 * @param array $array The multidimensional array to flatten
 * @return array The flattened array
 */
function flattenArray(array $array): array
{
    $result = [];

    array_walk_recursive($array, function ($item) use (&$result) {
        $result[] = $item;
    });

    return $result;
}

// Example multidimensional array
$multiArray = [
    [1, 2, [3, 4]],
    [5, 6],
    [7, [8, 9, [10]]]
];

// Flatten the array
$flattenedArray = flattenArray($multiArray);

// Display the flattened array
echo "Flattened Array: " . implode(', ', $flattenedArray) . PHP_EOL;

// Just for fun, let's add some humor
if (empty($flattenedArray)) {
    echo "Oh no, the array was so deep it got lost!" . PHP_EOL;
} else {
    echo "Success! The array is now as flat as a pancake." . PHP_EOL;
}
?>