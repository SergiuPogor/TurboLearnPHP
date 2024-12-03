<?php

// Example 1: Using array_map() to transform an array and return a new one
$numbers = [1, 2, 3, 4];
$mappedNumbers = array_map(function($num) {
    return $num * 2;
}, $numbers);
print_r($mappedNumbers);
// Output: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 )

// Example 2: Using array_walk() to modify the array in place
$array = [1, 2, 3, 4];
array_walk($array, function(&$value) {
    $value = $value * 2;
});
print_r($array);
// Output: Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 )

// Example 3: Using array_map() for a more complex transformation
$people = [
    ["name" => "Alice", "age" => 25],
    ["name" => "Bob", "age" => 30]
];
$updatedPeople = array_map(function($person) {
    $person["age"] += 5;
    return $person;
}, $people);
print_r($updatedPeople);
// Output: Array ( [0] => Array ( [name] => Alice [age] => 30 ) [1] => Array ( [name] => Bob [age] => 35 ) )

// Example 4: Using array_walk() for in-place modification of complex arrays
array_walk($people, function(&$person) {
    $person["age"] += 5;
});
print_r($people);
// Output: Array ( [0] => Array ( [name] => Alice [age] => 30 ) [1] => Array ( [name] => Bob [age] => 35 ) )
?>