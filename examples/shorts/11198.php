<?php

// Example 1: Using strtoupper() with standard Latin characters
$text = "hello world!";
$upperText = strtoupper($text);
echo $upperText;
// Output: HELLO WORLD!

// Example 2: Using mb_strtoupper() with multi-byte UTF-8 characters
$textUtf8 = "こんにちは世界!";
$upperTextUtf8 = mb_strtoupper($textUtf8, 'UTF-8');
echo $upperTextUtf8;
// Output: こんにちは世界!

// Example 3: Combining strtoupper() and mb_strtoupper() for mixed encoding
$textMixed = "hello world! こんにちは世界!";
$upperTextMixed = strtoupper($textMixed);
$upperTextMixedUtf8 = mb_strtoupper($textMixed, 'UTF-8');
echo $upperTextMixed . "\n"; // Output: HELLO WORLD! こんにちは世界!
echo $upperTextMixedUtf8 . "\n"; // Output: HELLO WORLD! こんにちは世界!
?>