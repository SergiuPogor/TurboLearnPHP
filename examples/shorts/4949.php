<?php

/**
 * Safely extracts the file name from a given path.
 *
 * @param string $filePath The full path to the file.
 * @return string The file name.
 */
function getSafeFileName($filePath)
{
    // Use basename to remove path elements and get the file name
    return basename($filePath);
}

// Example usage
$filePath = '/var/www/html/uploads/../../etc/passwd';
$safeFileName = getSafeFileName($filePath);

echo "Safe file name: " . $safeFileName . PHP_EOL; // Output: passwd

?>