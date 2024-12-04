<?php
$file = '/tmp/test/input.txt'; 

// Using file_get_contents to read the entire file at once
$content = file_get_contents($file);
echo $content; 

// Using fopen and fread to read the file in chunks
$handle = fopen($file, 'r');
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo $line; 
    }
    fclose($handle);
} else {
    echo "Error opening the file.";
}

// Another example with fopen and fread to read in fixed size chunks
$handle = fopen($file, 'r');
if ($handle) {
    while (($chunk = fread($handle, 1024)) !== false) {
        echo $chunk;
    }
    fclose($handle);
} else {
    echo "Error opening the file.";
}