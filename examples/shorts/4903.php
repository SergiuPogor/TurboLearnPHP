<?php

// Sample data: Multi-dimensional array of users with details
$users = [
    ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
    ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
    ['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com'],
    ['id' => 4, 'name' => 'David', 'email' => 'david@example.com']
];

// Using array_column to extract all email addresses
$emailAddresses = array_column($users, 'email');

// Displaying the result
print_r($emailAddresses);
/*
Output:
Array
(
    [0] => alice@example.com
    [1] => bob@example.com
    [2] => charlie@example.com
    [3] => david@example.com
)
*/

// Extracting names as keys and email addresses as values
$namesToEmails = array_column($users, 'email', 'name');

// Displaying the result
print_r($namesToEmails);
/*
Output:
Array
(
    [Alice] => alice@example.com
    [Bob] => bob@example.com
    [Charlie] => charlie@example.com
    [David] => david@example.com
)
*/
?>