<?php
// Example 1: Using strlen with a single-byte string
$string = "Hello World";
$length = strlen($string); // Returns 11
echo "Length using strlen: " . $length . "\n";

// Example 2: Using mb_strlen with a multi-byte string (UTF-8)
$multiByteString = "こんにちは世界"; // "Hello World" in Japanese
$lengthMb = mb_strlen($multiByteString, "UTF-8"); // Returns 7
echo "Length using mb_strlen: " . $lengthMb . "\n";

// Example 3: Comparing strlen and mb_strlen with multi-byte encoding
$multiByteString = "Hello 🌍"; // String with an emoji
$lengthStrlen = strlen($multiByteString); // Incorrect: Returns 13 (emoji counts as 4 bytes)
$lengthMbStrlen = mb_strlen($multiByteString, "UTF-8"); // Correct: Returns 10 (emoji counts as 1 character)
echo "Incorrect length using strlen: " . $lengthStrlen . "\n";
echo "Correct length using mb_strlen: " . $lengthMbStrlen . "\n";
?>