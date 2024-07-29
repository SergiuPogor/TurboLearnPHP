<?php

/**
 * Finds files in a directory matching a specific pattern.
 *
 * @param string $path The path to search in.
 * @param string $pattern The pattern to match files against.
 * @return array An array of matched file paths.
 */
function findFilesWithPattern($path, $pattern)
{
    // Build the full search path with pattern
    $searchPath = rtrim($path, '/') . '/' . $pattern;
    
    // Retrieve matched files
    $files = glob($searchPath, GLOB_NOSORT);
    
    // Optionally, filter only directories
    $directories = glob($path . '/' . $pattern, GLOB_ONLYDIR);
    
    // Merge files and directories into a single array
    return array_merge($files, $directories);
}

// Example usage
$directoryPath = '/path/to/your/directory';
$filePattern = '*.php'; // Find all PHP files
$matchedFiles = findFilesWithPattern($directoryPath, $filePattern);
print_r($matchedFiles);

?>