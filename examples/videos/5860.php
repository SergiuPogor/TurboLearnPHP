<?php

// Case 1: strlen() failure with multibyte characters
$asciiString = "Hello";
$multibyteString = "こんにちは";  // Japanese "Hello"
$emojiString = "😊😊😊";

// strlen() - Incorrect length for multibyte strings
echo "strlen ASCII: " . strlen($asciiString) . "\n";  // Output: 5 (correct)
echo "strlen Multibyte: " . strlen($multibyteString) . "\n";  // Output: 15 (incorrect, counting bytes)
echo "strlen Emoji: " . strlen($emojiString) . "\n";  // Output: 12 (incorrect)

// Case 2: Correct length using mb_strlen()
echo "mb_strlen ASCII: " . mb_strlen($asciiString) . "\n";  // Output: 5 (correct)
echo "mb_strlen Multibyte: " . mb_strlen($multibyteString) . "\n";  // Output: 5 (correct)
echo "mb_strlen Emoji: " . mb_strlen($emojiString) . "\n";  // Output: 3 (correct)

// Case 3: Always specify the encoding to avoid surprises
echo "mb_strlen with Encoding (UTF-8) Multibyte: " . mb_strlen($multibyteString, 'UTF-8') . "\n";  // Output: 5 (correct)
echo "mb_strlen with Encoding (UTF-8) Emoji: " . mb_strlen($emojiString, 'UTF-8') . "\n";  // Output: 3 (correct)

// Case 4: Handling UTF-16 encoding
$utf16String = mb_convert_encoding($multibyteString, 'UTF-16', 'UTF-8');
echo "mb_strlen UTF-16: " . mb_strlen($utf16String, 'UTF-16') . "\n";  // Output: 5 (correct)

// Case 5: Mixing different encodings in one script
$mixString = $asciiString . $multibyteString . $emojiString;
echo "Mixed string length with mb_strlen: " . mb_strlen($mixString, 'UTF-8') . "\n";  // Output: 13 (5 + 5 + 3)

// Case 6: Checking string length for file uploads with multibyte names
$filename = "/tmp/test/ファイル.txt";
if (mb_strlen($filename, 'UTF-8') > 255) {
    echo "Filename is too long.\n";
} else {
    echo "Filename length is valid.\n";
}

// Case 7: mb_strlen to validate input length in form submissions (e.g., usernames)
$username = "👨‍💻CoderMan";
if (mb_strlen($username, 'UTF-8') > 20) {
    echo "Username is too long.\n";
} else {
    echo "Username length is valid.\n";
}

?>