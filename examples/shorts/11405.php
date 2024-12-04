<?php
// Example using strstr
$email = "user@example.com";
$domain = strstr($email, '@'); // Extract everything after '@'
echo $domain; // Output: @example.com

// Example using substr
$string = "Hello, world!";
$substring = substr($string, 7, 5); // Extract 'world' starting at position 7 with length 5
echo $substring; // Output: world

// Performance comparison for strstr vs substr
$stringToSearch = str_repeat('The quick brown fox jumps over the lazy dog.', 1000);
$searchFor = "fox";

// Measure performance for strstr
$startStrstr = microtime(true);
strstr($stringToSearch, $searchFor);
$endStrstr = microtime(true);
echo "strstr took: " . ($endStrstr - $startStrstr) . " seconds\n";

// Measure performance for substr
$startSubstr = microtime(true);
substr($stringToSearch, 10, 5);
$endSubstr = microtime(true);
echo "substr took: " . ($endSubstr - $startSubstr) . " seconds\n";
?>