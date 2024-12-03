<?php
// Comparing strtoupper vs mb_strtoupper in PHP

// Example 1: Using strtoupper (fails for multibyte characters)
$asciiString = "hello world";
$utf8String = "こんにちは 世界"; // "Hello World" in Japanese

echo strtoupper($asciiString) . PHP_EOL; // Output: HELLO WORLD
echo strtoupper($utf8String) . PHP_EOL; // Output: こんにちは 世界 (unchanged, fails)

// Example 2: Using mb_strtoupper (handles multibyte correctly)
$asciiString = "hello world";
$utf8String = "привет мир"; // "Hello World" in Russian

echo mb_strtoupper($asciiString, 'UTF-8') . PHP_EOL; // Output: HELLO WORLD
echo mb_strtoupper($utf8String, 'UTF-8') . PHP_EOL; // Output: ПРИВЕТ МИР

// Example 3: Using mb_strtoupper with different encodings
$input = "métro"; // French string with special character
echo mb_strtoupper($input, 'UTF-8') . PHP_EOL; // Output: MÉTRO

// Example 4: Fallback for ASCII-only environments
function safeUpperCase(string $string): string
{
    return function_exists('mb_strtoupper') ? mb_strtoupper($string, 'UTF-8') : strtoupper($string);
}

echo safeUpperCase($utf8String) . PHP_EOL; // Output: ПРИВЕТ МИР
?>