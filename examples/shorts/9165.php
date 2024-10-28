<?php
// File: /tmp/test/data_manipulation.php

// Sample data for manipulation
$data = [
    ["name" => "Alice", "age" => 25],
    ["name" => "Bob", "age" => 30],
    ["name" => "Charlie", "age" => 35]
];

// 1. Use array_map to increment ages
$incrementedAges = array_map(function($person) {
    $person['age'] += 1; // Increment age by 1
    return $person;
}, $data);

// 2. Use array_filter to get only people above 28
$filteredPeople = array_filter($incrementedAges, function($person) {
    return $person['age'] > 28; // Filter condition
});

// 3. Use array_reduce to get total age
$totalAge = array_reduce($filteredPeople, function($carry, $person) {
    return $carry + $person['age']; // Sum ages
}, 0);

// Prepare response data
$response = [
    "incremented" => $incrementedAges,
    "filtered" => $filteredPeople,
    "total_age" => $totalAge
];

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>