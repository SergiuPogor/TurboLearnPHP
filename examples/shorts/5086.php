<?php
// Set the internal encoding to UTF-8
mb_internal_encoding('UTF-8');

// Sample text with mixed encodings
$text = "こんにちは世界"; // "Hello World" in Japanese
$file = '/tmp/test.txt';

// Write the UTF-8 encoded text to a file
file_put_contents($file, $text);

// Read the file content with the correct internal encoding
$handle = fopen($file, 'r');
if ($handle) {
    $content = fread($handle, filesize($file));
    fclose($handle);
    
    // Check if the internal encoding is correctly set
    if (mb_detect_encoding($content, 'UTF-8', true) === 'UTF-8') {
        echo "Encoding is UTF-8: " . $content; // Should output: こんにちは世界
    } else {
        echo "Encoding mismatch.";
    }
}

// Ensure proper cleanup
unlink($file);
?>