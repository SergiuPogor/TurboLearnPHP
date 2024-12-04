<?php

// Example 1: Using list() to unpack an indexed array
$numbers = [10, 20, 30];
list($a, $b, $c) = $numbers; // Unpacks into $a, $b, $c
echo "$a, $b, $c"; // Output: 10, 20, 30

// Example 2: Using array destructuring (PHP 7.1+)
[$x, $y, $z] = $numbers; // More readable and modern way
echo "$x, $y, $z"; // Output: 10, 20, 30

// Example 3: Array destructuring with default values
$person = ['John', null, 'Doe'];
[$firstName, $middleName = 'N/A', $lastName] = $person;
echo "$firstName, $middleName, $lastName"; // Output: John, N/A, Doe

?>