<?php

// Function to demonstrate the use of mb_substitute_character
function cleanUpString($input) {
    // Set the substitute character for invalid sequences
    mb_substitute_character("U+FFFD"); // Using the Unicode replacement character

    // Create an array to hold the results
    $results = [];

    // Check the input string for invalid characters
    $length = mb_strlen($input, 'UTF-8');

    for ($i = 0; $i < $length; $i++) {
        // Get the character at position $i
        $char = mb_substr($input, $i, 1, 'UTF-8');

        // If the character is valid, add it to the results
        if (mb_check_encoding($char, 'UTF-8')) {
            $results[] = $char;
        } else {
            // Add the substitute character for invalid sequences
            $results[] = mb_substitute_character();
        }
    }

    // Join the cleaned characters back into a string
    return implode('', $results);
}

// Sample input with invalid characters
$inputString = "Hello, \x80World! 👋"; // Example with an invalid UTF-8 byte

// Clean the input string
$cleanedString = cleanUpString($inputString);

// Display the result
echo "Original String: $inputString\n";
echo "Cleaned String: $cleanedString\n";