<?php

// Example PHP code to handle multibyte strings

// Ensure the mbstring extension is loaded
if (!extension_loaded('mbstring')) {
    die('The mbstring extension is not loaded. Please enable it to handle multibyte strings.');
}

// Sample multibyte string containing special characters
$multibyteString = "こんにちは、世界！"; // "Hello, World!" in Japanese

// Getting the length of a multibyte string
$length = mb_strlen($multibyteString);
echo "Length of the multibyte string: $length\n";

// Substring of a multibyte string
$substring = mb_substr($multibyteString, 0, 5);
echo "Substring of the multibyte string: $substring\n";

// Reversing a multibyte string
$reversed = mb_strrev($multibyteString);
echo "Reversed multibyte string: $reversed\n";

// Humor in code: Oh no, our string is upside down!
echo "Oops! Did we just reverse the world?\n";

// Custom function to reverse a multibyte string
function mb_strrev($str) {
    $length = mb_strlen($str);
    $reversed = '';
    while ($length-- > 0) {
        $reversed .= mb_substr($str, $length, 1);
    }
    return $reversed;
}

// Real-world scenario: Handling user input with multibyte characters
$userInput = "ユーザー入力"; // "User Input" in Japanese

// Encode user input
$encodedInput = htmlentities($userInput, ENT_QUOTES, 'UTF-8');
echo "Encoded user input: $encodedInput\n";

// Decode user input
$decodedInput = html_entity_decode($encodedInput, ENT_QUOTES, 'UTF-8');
echo "Decoded user input: $decodedInput\n";

echo "\nFinal thoughts: Multibyte strings can be tricky, but with the right tools, we can handle them with ease!";
?>