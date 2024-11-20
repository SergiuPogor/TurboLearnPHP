<?php

// Example of foreach vs for loop performance with array manipulation

// Sample data: A large array of numbers
$numbers = range(1, 1000000);

// 1. Using foreach to iterate through an array (optimized for simplicity)
$startTime = microtime(true);
$sumForeach = 0;
foreach ($numbers as $number) {
    $sumForeach += $number;
}
$endTime = microtime(true);
$foreachDuration = $endTime - $startTime;
echo "Foreach Duration: $foreachDuration seconds\n";

// 2. Using for loop with indexing to iterate through an array (best when you need control)
$startTime = microtime(true);
$sumFor = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $sumFor += $numbers[$i];
}
$endTime = microtime(true);
$forDuration = $endTime - $startTime;
echo "For Duration: $forDuration seconds\n";

// 3. A more advanced case: working with associative arrays using foreach
$associativeArray = [
    'apple' => 10,
    'banana' => 20,
    'orange' => 30
];

$startTime = microtime(true);
$sumAssocForeach = 0;
foreach ($associativeArray as $key => $value) {
    $sumAssocForeach += $value;
}
$endTime = microtime(true);
$assocForeachDuration = $endTime - $startTime;
echo "Associative Foreach Duration: $assocForeachDuration seconds\n";

?>