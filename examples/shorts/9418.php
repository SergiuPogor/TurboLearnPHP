<?php

// Example of variable declaration in PHP
$name = "John Doe"; // A string variable
$age = 30; // An integer variable
$isEmployed = true; // A boolean variable

// Function to display variable information
function displayInfo($varName, $varValue) {
    echo "Variable Name: $varName\n";
    echo "Value: $varValue\n";
    echo "Type: " . gettype($varValue) . "\n";
}

// Displaying variable information
displayInfo('name', $name);
displayInfo('age', $age);
displayInfo('isEmployed', $isEmployed);

// Using variables in a string
echo "Hello, my name is $name and I am $age years old.\n";

// Modifying the variable
$age += 1; // Increment age
echo "Next year, I will be $age years old.\n";

?>