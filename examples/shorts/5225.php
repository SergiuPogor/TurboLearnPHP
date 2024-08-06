<?php
// Example array with mixed-case strings
$files = [
    'File10.txt',
    'file2.txt',
    'File1.txt',
    'file12.txt',
    'File11.txt'
];

// Sort using natcasesort() for natural and case-insensitive order
natcasesort($files);

// Output sorted array
foreach ($files as $file) {
    echo $file . PHP_EOL;
}
?>