<?php

// Example using strtoupper() - works well with single-byte encodings like ISO-8859-1
$text = "hello world!";
$uppercaseText = strtoupper($text);
echo "Result with strtoupper: " . $uppercaseText . "\n"; // Output: HELLO WORLD!

// Example using mb_strtoupper() - handles multi-byte encodings like UTF-8
$textUtf8 = "café";
$uppercaseTextUtf8 = mb_strtoupper($textUtf8, 'UTF-8');
echo "Result with mb_strtoupper: " . $uppercaseTextUtf8 . "\n"; // Output: CAFÉ

// Performance Comparison between strtoupper() and mb_strtoupper() for large datasets
$largeText = str_repeat("hello world! ", 10000);

// Using strtoupper()
$start = microtime(true);
strtoupper($largeText);
$end = microtime(true);
$strtoupperTime = $end - $start;

// Using mb_strtoupper()
$start = microtime(true);
mb_strtoupper($largeText, 'UTF-8');
$end = microtime(true);
$mbStrtoupperTime = $end - $start;

echo "strtoupper execution time: " . $strtoupperTime . " seconds\n";
echo "mb_strtoupper execution time: " . $mbStrtoupperTime . " seconds\n";

// Conclusion: Use strtoupper() for simple encodings; use mb_strtoupper() for UTF-8 or multi-byte strings.
?>