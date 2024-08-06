<?php
// Example associative array
$scores = [
    'Alice' => 90,
    'Bob'   => 70,
    'Carol' => 85,
    'Dave'  => 95
];

// Sort the array by values in descending order using arsort() while preserving keys
arsort($scores);

// Output sorted array
foreach ($scores as $name => $score) {
    echo "$name scored $score" . PHP_EOL;
}
?>