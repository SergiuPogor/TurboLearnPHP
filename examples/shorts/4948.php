<?php

/**
 * Sets file permissions securely.
 *
 * @param string $filePath Path to the file.
 * @param int $permissions Permission code (e.g., 0644).
 * @return void
 * @throws Exception If setting permissions fails.
 */
function setFilePermissions($filePath, $permissions)
{
    // Ensure the file exists
    if (!file_exists($filePath)) {
        throw new Exception("File does not exist.");
    }

    // Attempt to set permissions
    if (!chmod($filePath, $permissions)) {
        throw new Exception("Failed to set permissions.");
    }

    echo "Permissions set to " . decoct($permissions) . " for " . $filePath . PHP_EOL;
}

// Example usage
try {
    setFilePermissions('/var/www/html/example.txt', 0644);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}

?>