<?php
// Example 1: Using isset to check if a variable is defined and not null
$var1 = 0;
if (isset($var1)) {
    echo "Variable is set.";
} else {
    echo "Variable is not set.";
}

// Example 2: Using empty to check if a variable is considered empty
$var2 = 0;
if (empty($var2)) {
    echo "Variable is empty.";
} else {
    echo "Variable has a value.";
}

// Example 3: Using isset to avoid errors when accessing an undefined variable
if (isset($var3)) {
    echo "Var3 is set and can be used.";
} else {
    echo "Var3 is not set.";
}

// Example 4: Using empty to check a user input that might be empty or invalid
$userInput = '';
if (empty($userInput)) {
    echo "Please enter a valid value.";
} else {
    echo "User input is valid.";
}
?>