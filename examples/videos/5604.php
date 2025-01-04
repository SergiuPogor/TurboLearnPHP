<?php

// Function to validate if a string contains only punctuation characters
function isOnlyPunctuation($input) {
    // Check if the string is empty
    if (empty($input)) {
        return "Input is empty";
    }
    
    // Use ctype_punct to determine if the input is all punctuation
    if (ctype_punct($input)) {
        return "Input contains only punctuation";
    } else {
        return "Input contains other characters";
    }
}

// Example usage of the validation function
$input1 = "!@#$%^&*()"; // Only punctuation
$input2 = "Hello!";    // Contains letters and punctuation
$input3 = "";          // Empty string

// Validate the inputs
$result1 = isOnlyPunctuation($input1);
$result2 = isOnlyPunctuation($input2);
$result3 = isOnlyPunctuation($input3);

// Output the results
echo "Validation result for input1: $result1\n";
echo "Validation result for input2: $result2\n";
echo "Validation result for input3: $result3\n";

// Function to filter out non-punctuation characters from a string
function filterNonPunctuation($input) {
    // Use preg_replace to remove non-punctuation characters
    return preg_replace('/[^\p{P}]/u', '', $input);
}

// Example of filtering
$filteredInput = filterNonPunctuation("Hello, World! Welcome @ 2023.");
echo "Filtered punctuation: $filteredInput\n";

?>