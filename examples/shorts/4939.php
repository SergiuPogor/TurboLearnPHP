<?php
// Matching filenames with patterns using fnmatch

$directoryPath = '/path/to/directory';
$pattern = '*.txt';

// Open the directory
if ($handle = opendir($directoryPath)) {
    // Loop through the directory
    while (false !== ($entry = readdir($handle))) {
        // Check if the entry matches the pattern
        if (fnmatch($pattern, $entry)) {
            // Output the matching filename
            echo "Matching file: $entry" . PHP_EOL;
        }
    }
    // Close the directory handle
    closedir($handle);
}

// Example of using fnmatch for more complex patterns
$pattern = 'data_*.{csv,txt}';
$options = FNM_CASEFOLD | FNM_EXTMATCH; // Case insensitive and extended match

if ($handle = opendir($directoryPath)) {
    while (false !== ($entry = readdir($handle))) {
        if (fnmatch($pattern, $entry, $options)) {
            echo "Matching file: $entry" . PHP_EOL;
        }
    }
    closedir($handle);
}

// Handling errors when the directory does not exist
if (!is_dir($directoryPath)) {
    throw new Exception("The specified directory does not exist: $directoryPath");
}
?>