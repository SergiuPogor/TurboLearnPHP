<?php

// This script demonstrates how to use mb_strripos() to find the last occurrence of a substring 
// in a multibyte string, ignoring case sensitivity.

$multibyteString = "これは日本語のテキストです。これはテストです。"; // A sample Japanese string
$substring = "テスト"; // Substring to find

// Use mb_strripos to find the last occurrence of the substring, ignoring case
$lastPosition = mb_strripos($multibyteString, $substring);

if ($lastPosition !== false) {
    echo "The last occurrence of '{$substring}' is at position: {$lastPosition}\n";
} else {
    echo "Substring '{$substring}' not found.\n";
}

// Example with UTF-8 string
$utf8String = "Hello, 世界! こんにちは!";
$utf8Substring = "こんにちは";

// Finding the last occurrence in UTF-8 string, case-insensitive
$lastUtf8Position = mb_strripos($utf8String, $utf8Substring);
if ($lastUtf8Position !== false) {
    echo "The last occurrence of '{$utf8Substring}' is at position: {$lastUtf8Position}\n";
} else {
    echo "Substring '{$utf8Substring}' not found in UTF-8 string.\n";
}

// Example with different character set (Shift JIS)
$shiftJisString = mb_convert_encoding("こんにちは", "SJIS", "UTF-8"); // Convert UTF-8 to Shift JIS
$shiftJisSubstring = mb_convert_encoding("ちは", "SJIS", "UTF-8"); // Substring in Shift JIS

// Finding the last occurrence in Shift JIS string, case-insensitive
$lastShiftJisPosition = mb_strripos($shiftJisString, $shiftJisSubstring);
if ($lastShiftJisPosition !== false) {
    echo "The last occurrence of '{$shiftJisSubstring}' in Shift JIS is at position: {$lastShiftJisPosition}\n";
} else {
    echo "Substring '{$shiftJisSubstring}' not found in Shift JIS string.\n";
}
