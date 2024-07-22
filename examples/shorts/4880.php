<?php
// Example PHP code demonstrating the use of array_column to extract specific columns from a multi-dimensional array

// Sample data representing a list of users with various attributes
$users = [
    [
        'id' => 1,
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'age' => 28
    ],
    [
        'id' => 2,
        'name' => 'Jane Smith',
        'email' => 'jane.smith@example.com',
        'age' => 34
    ],
    [
        'id' => 3,
        'name' => 'Sam Brown',
        'email' => 'sam.brown@example.com',
        'age' => 22
    ],
    [
        'id' => 4,
        'name' => 'Lucy Black',
        'email' => 'lucy.black@example.com',
        'age' => 29
    ]
];

// Extracting the 'email' column from the array of users
$emails = array_column($users, 'email');

print_r($emails);
/*
Output:
Array
(
    [0] => john.doe@example.com
    [1] => jane.smith@example.com
    [2] => sam.brown@example.com
    [3] => lucy.black@example.com
)
*/

// Extracting the 'name' column and using 'id' as the index
$names_by_id = array_column($users, 'name', 'id');

print_r($names_by_id);
/*
Output:
Array
(
    [1] => John Doe
    [2] => Jane Smith
    [3] => Sam Brown
    [4] => Lucy Black
)
*/
?>