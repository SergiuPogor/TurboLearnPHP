<?php
// Example of using is_array
$var1 = ['name' => 'John', 'age' => 30];
if (is_array($var1)) {
    echo "var1 is an array.\n"; // This will run because $var1 is an array
}

// Example of using array_key_exists
$var2 = ['name' => 'Jane', 'age' => 28];
if (array_key_exists('name', $var2)) {
    echo "Key 'name' exists in var2.\n"; // This will run because 'name' is a key in $var2
}

// Using is_array in a check before processing a variable
$var3 = 'string';
if (is_array($var3)) {
    // Process the array
    echo "It's an array.\n";
} else {
    echo "It's not an array, skipping.\n"; // This will run because $var3 is not an array
}

// Using array_key_exists for a non-existent key
$var4 = ['email' => 'john@example.com'];
if (!array_key_exists('address', $var4)) {
    echo "'address' key does not exist in var4.\n"; // This will run because 'address' is missing
}
?>