<?php

function findFilesWithPattern($directory, $pattern)
{
    // Use glob to find files matching the pattern
    $files = glob($directory . DIRECTORY_SEPARATOR . $pattern);

    return $files;
}

// Example usage
$directory = '/var/www/html/uploads';
$pattern = '*.txt';

$files = findFilesWithPattern($directory, $pattern);

foreach ($files as $file) {
    echo "Found file: " . $file . PHP_EOL;
}

?>