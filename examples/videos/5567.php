<?php

// Example: Using preg_split() for complex string splitting in real-world applications

// Scenario 1: Splitting a string on multiple delimiters

$text = "apple, banana; orange pineapple | grape";
$delimiters = "/[,\;\|]+/"; // Split on comma, semicolon, or pipe
$fruits = preg_split($delimiters, $text);

// Scenario 2: Splitting a string with varying amounts of whitespace

$sentence = "The quick    brown    fox jumps    over the lazy dog";
$words = preg_split("/\s+/", $sentence);

// Scenario 3: Limiting the number of splits

$paragraph = "PHP is great. PHP is versatile. PHP is everywhere.";
$limitedSplit = preg_split("/\.\s+/", $paragraph, 2); // Only split on the first full stop

// Scenario 4: Using a regular expression with a lookbehind to split after specific patterns

$complexText = "2023-09-15:Report, 2023-10-01:Analysis";
$splitPattern = "/(?<=\d{4}-\d{2}-\d{2})/"; // Split after the date (YYYY-MM-DD)
$reports = preg_split($splitPattern, $complexText);

// Scenario 5: Using capturing parentheses in preg_split() to include delimiters in the result

$expression = "3 + 4 - 2 * 6 / 2";
$splitMath = preg_split("/([+\-*\/])/", $expression, -1, PREG_SPLIT_DELIM_CAPTURE);

// Scenario 6: Handling UTF-8 and multibyte characters in string splitting

$utf8Text = "cafe au lait, mañana, façade";
$utf8Words = preg_split("/[,\s]+/u", $utf8Text); // Handling UTF-8 characters with 'u' modifier

// Scenario 7: Reading data from a file and splitting lines based on patterns

$fileContent = file_get_contents('/tmp/test/input.txt');
$lines = preg_split("/\r\n|\n|\r/", $fileContent); // Handle different newline types

// Scenario 8: Combining preg_split() with filters for advanced processing

$inputData = "user:john_doe, email:john@example.com, age:30";
$splitData = preg_split("/[:\s,]+/", $inputData);

// Now you can iterate over the results and process key-value pairs
for ($i = 0; $i < count($splitData); $i += 2) {
    $key = $splitData[$i];
    $value = $splitData[$i + 1];
    // Process each key-value pair...
}

// Scenario 9: Using preg_split() to parse a CSV file with irregular delimiters

$csvData = "item1, item2; item3 | item4";
$csvPattern = "/[,;\|]+/"; // Handle commas, semicolons, and pipes
$items = preg_split($csvPattern, $csvData);

// Scenario 10: Using preg_split() with a custom pattern for a ZIP file extraction log

$zipLog = file_get_contents('/tmp/test/input.zip');
$logEntries = preg_split("/\n(?=\[)/", $zipLog); // Split log entries starting with '['

// Scenario 11: Dealing with mixed data types in a single string

$log = "2024-10-10: Error: File not found; 2024-10-11: Info: User login successful";
$logPattern = "/(?<=\d{4}-\d{2}-\d{2}:)/"; // Split logs after date
$logEntries = preg_split($logPattern, $log);

// Now each entry in $logEntries is a separate log event with its corresponding details

?>
