<?php
// Example using strtoupper (single-byte encoding)
$text = "hello world";
$uppercased = strtoupper($text); // Works fine for simple ASCII strings
echo $uppercased; // Outputs: HELLO WORLD

// Example using mb_strtoupper (multibyte encoding)
$utf8_text = "こんにちは 世界"; // Japanese text
$uppercased_utf8 = mb_strtoupper($utf8_text, 'UTF-8'); // Correctly handles multibyte characters
echo $uppercased_utf8; // Outputs: こんにちは 世界 (proper handling for multibyte)

// Another example with accented characters
$accented_text = "école café";
$uppercased_accented = mb_strtoupper($accented_text, 'UTF-8'); // Handles accented characters properly
echo $uppercased_accented; // Outputs: ÉCOLE CAFÉ

?>