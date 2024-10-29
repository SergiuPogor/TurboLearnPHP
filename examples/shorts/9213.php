<?php
// Demonstrating PHP's dynamic type switching

$number = 5; // Integer
$string = "10"; // String

// Adding an integer to a string - PHP will convert the string to integer
$result = $number + $string;
echo "Result of adding integer and string: $result\n"; // Output: 15

// Comparison example
$compare = ($number == $string); // This is true due to type juggling
echo "Is number equal to string? " . ($compare ? 'Yes' : 'No') . "\n"; // Output: Yes

// Using strict comparison to avoid type juggling
$strictCompare = ($number === $string); // This is false because types are different
echo "Is number strictly equal to string? " . ($strictCompare ? 'Yes' : 'No') . "\n"; // Output: No

// An array example with mixed types
$mixedArray = [1, "2", 3.5];
foreach ($mixedArray as $item) {
    echo "Item: $item, Type: " . gettype($item) . "\n"; // Displays type of each item
}
?>