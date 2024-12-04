<?php
// Example 1: Using str_replace for a simple string replacement
$text = "The quick brown fox jumps over the lazy dog";
$replaced = str_replace("fox", "cat", $text); // Replaces 'fox' with 'cat'

// Example 2: Using preg_replace with regular expressions for pattern replacement
$pattern = '/quick (.*) fox/';
$replacement = 'fast $1 lion';
$text = "The quick brown fox jumps over the lazy dog";
$replacedWithRegex = preg_replace($pattern, $replacement, $text);

// Example 3: Using str_replace to replace multiple words
$words = ["fox", "dog"];
$replacements = ["cat", "rat"];
$text = "The quick brown fox jumps over the lazy dog";
$replacedMultiple = str_replace($words, $replacements, $text);

// Example 4: Using preg_replace with a more complex pattern
$pattern = '/(\d{3})-(\d{2})-(\d{4})/';
$replacement = '$1/$2/$3';
$phone = "123-45-6789";
$formattedPhone = preg_replace($pattern, $replacement, $phone);
?>