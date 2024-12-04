<?php
// Example 1: Using isset() to check if a variable is set
$name = null;
if (isset($name)) {
    echo "Variable is set.";
} else {
    echo "Variable is not set.";  // Output: Variable is not set.
}

// Example 2: Using !empty() to check if a variable is not empty
$age = 0;
if (!empty($age)) {
    echo "Variable is not empty.";
} else {
    echo "Variable is empty.";  // Output: Variable is empty.
}

// Example 3: Using isset() with arrays
$array = ['name' => 'John', 'age' => 0];
if (isset($array['name'])) {
    echo "Name is set.";
} else {
    echo "Name is not set.";
}

// Example 4: Using !empty() with arrays
if (!empty($array['age'])) {
    echo "Age is not empty.";  // Output: Age is empty.
} else {
    echo "Age is empty.";  // Output: Age is empty.
}
?>