<?php
// Initial array
$numbers = [1, 2, 3];

// Adding elements to the array
array_push($numbers, 4, 5, 6);

// Output the updated array
print_r($numbers);

// Complex scenario: Adding associative array elements
$people = [
    ["name" => "John", "age" => 30],
    ["name" => "Jane", "age" => 25]
];

// Add new person
array_push($people, ["name" => "Alice", "age" => 35]);

// Output the updated array
print_r($people);
?>