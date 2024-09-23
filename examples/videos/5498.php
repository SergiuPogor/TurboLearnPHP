<?php

// Define multibyte string and substring
$multibyte_string = "こんにちは、世界！"; // Japanese for "Hello, World!"
$substring = "世界"; // Japanese for "World"

// Find position of substring in multibyte string using iconv_strpos
$position = iconv_strpos($multibyte_string, $substring, 0, 'UTF-8');

// Check if the position was found
if ($position === false) {
    echo "Substring not found in the multibyte string.";
} else {
    echo "Substring '$substring' found at position $position.";
}

// Example with different encoding
$multibyte_string2 = "안녕하세요, 세계!"; // Korean for "Hello, World!"
$substring2 = "세계"; // Korean for "World"

// Find position in Korean string
$position2 = iconv_strpos($multibyte_string2, $substring2, 0, 'UTF-8');

if ($position2 === false) {
    echo "Substring not found in the Korean multibyte string.";
} else {
    echo "Substring '$substring2' found at position $position2.";
}

// Handling errors and encoding issues
libxml_use_internal_errors(true);
if ($position === false || $position2 === false) {
    echo "Error occurred while finding substring position.";
    foreach (libxml_get_errors() as $error) {
        echo "\t", $error->message;
    }
    libxml_clear_errors();
}

?>