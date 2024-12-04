<?php
// Using implode to join array elements into a string
$array1 = ['apple', 'banana', 'cherry'];
$joined1 = implode(", ", $array1);
echo $joined1 . "\n"; // Output: apple, banana, cherry

// Using join to achieve the same result
$array2 = ['apple', 'banana', 'cherry'];
$joined2 = join(", ", $array2);
echo $joined2 . "\n"; // Output: apple, banana, cherry

// Performance Comparison
$array3 = range(1, 1000); // Large array for testing
$start = microtime(true);
implode(", ", $array3);
$end = microtime(true);
echo "Implode time: " . ($end - $start) . "\n";

$start = microtime(true);
join(", ", $array3);
$end = microtime(true);
echo "Join time: " . ($end - $start) . "\n"; // Results should be very close
?>