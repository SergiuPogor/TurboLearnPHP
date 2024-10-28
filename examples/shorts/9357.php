<?php

// Function to demonstrate some built-in PHP string functions
function stringManipulationExamples($input) {
    // Convert to uppercase
    $uppercase = strtoupper($input);
    
    // Find the length of the string
    $length = strlen($input);
    
    // Reverse the string
    $reversed = strrev($input);
    
    // Replace a substring
    $replaced = str_replace("Hello", "Hi", $input);
    
    // Output results
    return [
        'original' => $input,
        'uppercase' => $uppercase,
        'length' => $length,
        'reversed' => $reversed,
        'replaced' => $replaced,
    ];
}

// Sample input
$inputString = "Hello, welcome to PHP!";
$result = stringManipulationExamples($inputString);

// Display the results
foreach ($result as $key => $value) {
    echo ucfirst($key) . ": " . $value . "<br>";
}