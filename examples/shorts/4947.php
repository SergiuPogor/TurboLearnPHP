<?php

function safeRename($oldName, $newName)
{
    // Check if the old file or directory exists
    if (!file_exists($oldName)) {
        throw new Exception("The file or directory does not exist.");
    }
    
    // Check if the new name already exists
    if (file_exists($newName)) {
        throw new Exception("The target name already exists.");
    }

    // Attempt to rename the file or directory
    if (!rename($oldName, $newName)) {
        throw new Exception("Failed to rename the file or directory.");
    }

    echo "Renamed successfully from $oldName to $newName" . PHP_EOL;
}

// Example usage
try {
    safeRename('/var/www/html/oldfile.txt', '/var/www/html/newfile.txt');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}

?>