<?php

// Example PHP code to handle multi-dimensional arrays efficiently

// Function to process multi-dimensional array using recursion
function processMultiDimensionalArray(array $data) {
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            // Recursive call for nested arrays
            echo "Processing nested array at key: $key\n";
            processMultiDimensionalArray($value);
        } else {
            // Process simple values
            echo "Processing value: $value at key: $key\n";
        }
    }
}

// Example multi-dimensional array
$multiDimensionalArray = [
    'level1' => [
        'level2a' => [1, 2, 3],
        'level2b' => [4, 5, 6],
        'level2c' => [
            'level3a' => [7, 8],
            'level3b' => [9, 10]
        ]
    ]
];

// Process the multi-dimensional array
processMultiDimensionalArray($multiDimensionalArray);

// Completed processing
echo "Finished processing multi-dimensional array.\n";

?>