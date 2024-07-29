<?php

/**
 * Lists and sorts directory contents.
 *
 * @param string $dir The directory path.
 * @return array The sorted list of files and directories.
 */
function listAndSortDirectory($dir)
{
    // Get the list of files and directories
    $files = scandir($dir);

    // Filter out '.' and '..' entries
    $files = array_diff($files, array('.', '..'));

    // Sort the list alphabetically
    sort($files);

    return $files;
}

// Example usage
$directoryPath = '/path/to/directory';
$sortedFiles = listAndSortDirectory($directoryPath);

echo "Sorted directory contents:\n";
foreach ($sortedFiles as $file) {
    echo $file . PHP_EOL;
}

?>