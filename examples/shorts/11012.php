<?php

// Using array_push() to add a single element
$array1 = [1, 2, 3];
array_push($array1, 4);
echo "Array after array_push: ";
print_r($array1); // Output: [1, 2, 3, 4]

// Using array_push() to add multiple elements
array_push($array1, 5, 6);
echo "Array after array_push multiple: ";
print_r($array1); // Output: [1, 2, 3, 4, 5, 6]

// Using array_merge() to merge two arrays
$array2 = [7, 8, 9];
$mergedArray = array_merge($array1, $array2);
echo "Array after array_merge: ";
print_r($mergedArray); // Output: [1, 2, 3, 4, 5, 6, 7, 8, 9]

// Performance comparison between array_push() and array_merge()
$largeArray1 = range(1, 10000);
$largeArray2 = range(10001, 20000);

// Measuring time for array_push()
$start = microtime(true);
foreach ($largeArray2 as $item) {
    array_push($largeArray1, $item);
}
$end = microtime(true);
$pushTime = $end - $start;

// Measuring time for array_merge()
$start = microtime(true);
$mergedArrayLarge = array_merge($largeArray1, $largeArray2);
$end = microtime(true);
$mergeTime = $end - $start;

echo "array_push execution time: " . $pushTime . " seconds\n";
echo "array_merge execution time: " . $mergeTime . " seconds\n";

// Conclusion: Use array_push() for adding individual elements, array_merge() for merging arrays
?>