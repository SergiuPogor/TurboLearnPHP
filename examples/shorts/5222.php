<?php
// Array with various elements
$data = [
    'apple' => 'red',
    'banana' => 'yellow',
    'cherry' => 'red',
    'fruits' => [
        'grapes' => 'purple',
        'orange' => 'orange'
    ]
];

// Count top-level elements
$topLevelCount = count($data);

// Count elements in nested array using recursion
function count_recursive($array) {
    $count = 0;
    foreach ($array as $value) {
        if (is_array($value)) {
            $count += count_recursive($value);
        } else {
            $count++;
        }
    }
    return $count;
}

$nestedCount = count_recursive($data);

// Output results
echo "Top-level count: " . $topLevelCount . PHP_EOL;
echo "Total count including nested elements: " . $nestedCount . PHP_EOL;
?>