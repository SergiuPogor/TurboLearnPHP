<?php
// strlen: Works for single-byte strings (e.g., ASCII)
$ascii_string = "Hello";
$ascii_length = strlen($ascii_string);
echo "Length of ASCII string: $ascii_length\n";  // 5

// mb_strlen: Works for multibyte strings (e.g., UTF-8)
$utf8_string = "こんにちは";  // "Hello" in Japanese
$utf8_length = mb_strlen($utf8_string, 'UTF-8');
echo "Length of UTF-8 string: $utf8_length\n";  // 5

// Handling strings with both single and multibyte characters
$mixed_string = "Hello こんにちは";
$length_mixed = mb_strlen($mixed_string, 'UTF-8');
echo "Length of mixed string: $length_mixed\n";  // 10
?>