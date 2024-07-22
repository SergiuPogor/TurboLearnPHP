<?php
/**
 * Filters a large array efficiently using a custom callback.
 *
 * @param array $array The array to filter.
 * @param callable $callback The callback function to apply.
 * @return array The filtered array.
 */
function filterLargeArray(array $array, callable $callback): array {
    return array_values(array_filter($array, $callback));
}

// Example usage with a large array
$largeArray = range(1, 10000); // Array of numbers from 1 to 10000
$filteredArray = filterLargeArray($largeArray, fn($value) => $value % 2 === 0); // Keep even numbers

print_r($filteredArray);

/*
Output:
Array
(
    [0] => 2
    [1] => 4
    [2] => 6
    [3] => 8
    ...
    [4999] => 10000
)
*/
?>