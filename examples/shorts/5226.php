<?php
// Example associative array
$employees = [
    'John' => 5000,
    'Jane' => 7000,
    'Doe'  => 3000,
    'Anna' => 6000
];

// Sort the array by values using asort() while preserving keys
asort($employees);

// Output sorted array
foreach ($employees as $name => $salary) {
    echo "$name earns $salary" . PHP_EOL;
}
?>