<?php

// Using var_dump() for detailed debugging
$array1 = [1, "test", 3.14, true];
echo "Using var_dump():\n";
var_dump($array1);
// Output: array(4) { [0]=> int(1) [1]=> string(4) "test" [2]=> float(3.14) [3]=> bool(true) }

// Using print_r() for more readable output
$array2 = ["apple", "banana", "cherry"];
echo "\nUsing print_r():\n";
print_r($array2);
// Output: Array ( [0] => apple [1] => banana [2] => cherry )

// Debugging an object using var_dump()
$person = (object)[
    "name" => "John",
    "age" => 30,
    "isMarried" => true
];
echo "\nUsing var_dump() with object:\n";
var_dump($person);
// Output: object(stdClass)#1 (3) { ["name"]=> string(4) "John" ["age"]=> int(30) ["isMarried"]=> bool(true) }

// Debugging an object using print_r()
echo "\nUsing print_r() with object:\n";
print_r($person);
// Output: stdClass Object ( [name] => John [age] => 30 [isMarried] => 1 )
?>