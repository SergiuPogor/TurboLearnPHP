<?php

// Example demonstrating error vs exception handling in PHP

// Error example
$file = 'nonexistent_file.txt';
if (!file_exists($file)) {
    trigger_error("File '$file' not found!", E_USER_ERROR);
}

// Exception example
function divide($numerator, $denominator) {
    if ($denominator == 0) {
        throw new Exception("Division by zero!");
    }
    return $numerator / $denominator;
}

try {
    echo divide(10, 0);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>