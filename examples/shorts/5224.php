<?php
// Example array with mixed numeric and string values
$files = [
    'file10.txt',
    'file2.txt',
    'file1.txt',
    'file12.txt',
    'file11.txt'
];

// Sort using natsort() for natural order
natsort($files);

// Output sorted array
foreach ($files as $file) {
    echo $file . PHP_EOL;
}
?>