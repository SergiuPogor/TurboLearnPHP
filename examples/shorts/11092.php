<?php
// Example 1: Reading a file with file_get_contents
$file = '/tmp/test/input.txt';
$content = file_get_contents($file);
echo "Using file_get_contents:\n";
echo $content;

// Example 2: Reading a file with fopen and fread
$file = '/tmp/test/input.txt';
$handle = fopen($file, 'r');
echo "Using fopen and fread:\n";
while (!feof($handle)) {
    $line = fgets($handle);
    echo $line;
}
fclose($handle);

// Example 3: Reading a file line-by-line with fopen
$handle = fopen($file, 'r');
echo "Using fopen line-by-line:\n";
while ($line = fgets($handle)) {
    echo $line;
}
fclose($handle);
?>