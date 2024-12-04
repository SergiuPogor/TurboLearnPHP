<?php
// Example 1: Using strtoupper() with ASCII characters
$asciiString = "hello world";
$upperAscii = strtoupper($asciiString); // Output: "HELLO WORLD"
echo $upperAscii;

// Example 2: Using mb_strtoupper() with UTF-8 characters
$utf8String = "안녕하세요 world";
$upperUtf8 = mb_strtoupper($utf8String, "UTF-8"); // Output: "안녕하세요 WORLD"
echo $upperUtf8;

// Example 3: Using strtoupper() on multibyte characters (incorrect behavior)
$incorrect = strtoupper("Привет мир"); // May produce incorrect results for non-ASCII characters
echo $incorrect;

// Example 4: Using mb_strtoupper() on multibyte characters (correct behavior)
$correct = mb_strtoupper("Привет мир", "UTF-8"); // Output: "ПРИВЕТ МИР"
echo $correct;
?>