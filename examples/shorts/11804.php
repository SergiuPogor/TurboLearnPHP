<?php
$users = [
    1 => 'John',
    2 => 'Jane',
    3 => 'Alice',
    4 => 'Bob'
];

// Using in_array to check if a value exists
if (in_array('Alice', $users)) {
    echo "Alice is in the list.";
} else {
    echo "Alice is not in the list.";
}

// Using array_search to get the key of a value
$key = array_search('Alice', $users);
if ($key !== false) {
    echo "Alice is found at index $key.";
} else {
    echo "Alice not found.";
}

// Example showing performance difference with large array
$largeArray = range(1, 1000000);
$startTime = microtime(true);
in_array(500000, $largeArray); // Check for existence
$endTime = microtime(true);
echo "in_array took " . ($endTime - $startTime) . " seconds.";

$startTime = microtime(true);
array_search(500000, $largeArray); // Check for key
$endTime = microtime(true);
echo "array_search took " . ($endTime - $startTime) . " seconds.";