<?php

/**
 * Resolves and validates the absolute path of a file.
 *
 * @param string $path The path to resolve.
 * @return string|false The resolved absolute path or false on failure.
 */
function getAbsolutePath($path)
{
    // Resolve the absolute path
    $resolvedPath = realpath($path);

    // Check if the path is valid
    if ($resolvedPath === false) {
        return false; // Path could not be resolved
    }

    // Ensure the path is within a specific directory (optional)
    // $baseDir = '/var/www/html';
    // if (strpos($resolvedPath, $baseDir) !== 0) {
    //     return false; // Path is outside the allowed directory
    // }

    return $resolvedPath;
}

// Example usage
$path = '../uploads/file.txt';
$absolutePath = getAbsolutePath($path);

if ($absolutePath !== false) {
    echo "Absolute path: " . $absolutePath . PHP_EOL;
} else {
    echo "Path could not be resolved." . PHP_EOL;
}

?>