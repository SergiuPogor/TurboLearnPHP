<?php

// Example demonstrating strict comparison operator ===
$value1 = 10;
$value2 = '10';

// Regular comparison
if ($value1 == $value2) {
    echo "Regular comparison: true\n";
} else {
    echo "Regular comparison: false\n"; // This will execute
}

// Strict comparison
if ($value1 === $value2) {
    echo "Strict comparison: true\n"; // This will not execute
} else {
    echo "Strict comparison: false\n";
}

?>