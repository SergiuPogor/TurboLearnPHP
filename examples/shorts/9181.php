<?php

// Example of using strip_tags() to remove HTML tags from a string

$inputHtml = "<p>This is a <b>bold</b> statement!</p>";
$cleanedString = strip_tags($inputHtml);
// This will remove all HTML tags, leaving only the text

// Another usage where we allow specific tags to remain
$allowedTags = "<b><i>";
$partiallyCleanedString = strip_tags($inputHtml, $allowedTags);
// This will keep only <b> and <i> tags, removing all others

// Handling user input, potentially from a form, while removing harmful HTML
$userInput = "<script>alert('XSS');</script><p>Hello <b>world</b>!</p>";
$sanitizedInput = strip_tags($userInput, $allowedTags);
// Only keeps <b> tag and discards malicious scripts

// Advanced usage: Reading from a file and cleaning it
$filePath = '/tmp/test/input.txt';
if (file_exists($filePath)) {
    $fileContent = file_get_contents($filePath);
    $cleanedFileContent = strip_tags($fileContent);
}

// Another approach using a regular expression for more complex tag handling
$inputComplexHtml = "<div><span style='color:red;'>Test</span></div>";
$regexCleanedString = preg_replace('/<[^>]*>/', '', $inputComplexHtml);
// Removes all tags using regular expression matching

?>