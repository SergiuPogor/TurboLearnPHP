<?php
// Example of efficient float validation in PHP

$input = "123.45";

// Using filter_var to validate float
if (filter_var($input, FILTER_VALIDATE_FLOAT) !== false) {
    echo "$input is a valid float.";
} else {
    echo "$input is not a valid float.";
}

// Example with an invalid float input
$invalidInput = "123.45abc";
if (filter_var($invalidInput, FILTER_VALIDATE_FLOAT) !== false) {
    echo "$invalidInput is a valid float.";
} else {
    echo "$invalidInput is not a valid float.";
}
?>