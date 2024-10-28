<?php

// Example of using array_map() to transform an array
$numbers = [1, 2, 3, 4, 5];

// Define a callback function to square each number
$squareFunction = function ($number) {
    return $number ** 2; // Square the number
};

// Use array_map() to apply the callback function
$squaredNumbers = array_map($squareFunction, $numbers);

// Display the result
echo "Original Numbers: " . implode(", ", $numbers) . "\n";
echo "Squared Numbers: " . implode(", ", $squaredNumbers) . "\n";

// Example of processing an array of user names
$userNames = ["alice", "bob", "charlie"];

// Capitalize each user name
$capitalizedNames = array_map('ucfirst', $userNames);

// Display the capitalized names
echo "Capitalized User Names: " . implode(", ", $capitalizedNames) . "\n";

?>