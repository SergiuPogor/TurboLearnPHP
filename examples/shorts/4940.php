<?php
// Searching files using patterns with glob

$directoryPath = '/path/to/directory';
$pattern = '*.txt';

// Find all .txt files in the specified directory
$files = glob($directoryPath . '/' . $pattern);

// Loop through the found files and output their names
foreach ($files as $file) {
    echo "Found file: " . basename($file) . PHP_EOL;
}

// Example of using glob for more complex patterns
$complexPattern = 'data_*.{csv,txt}';
$options = GLOB_BRACE; // Enable brace expansion for patterns

$files = glob($directoryPath . '/' . $complexPattern, $options);

foreach ($files as $file) {
    echo "Found file: " . basename($file) . PHP_EOL;
}

// Handling case when no files match the pattern
if (empty($files)) {
    echo "No files found matching the pattern." . PHP_EOL;
}

// Error handling for invalid directory path
if (!is_dir($directoryPath)) {
    throw new Exception("The specified directory does not exist: $directoryPath");
}
?>