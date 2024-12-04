<?php
// Example 1: Using unlink to delete a file
$filePath = '/tmp/test/example_file.txt';
if (unlink($filePath)) {
    echo "File deleted successfully.\n";
} else {
    echo "Failed to delete file.\n";
}

// Example 2: Using rmdir to delete an empty directory
$directoryPath = '/tmp/test/empty_folder';
if (rmdir($directoryPath)) {
    echo "Directory deleted successfully.\n";
} else {
    echo "Failed to delete directory. Ensure it's empty.\n";
}

// Example 3: Trying to delete a non-empty directory with rmdir (this will fail)
$nonEmptyDir = '/tmp/test/non_empty_folder';
if (rmdir($nonEmptyDir)) {
    echo "Directory deleted successfully.\n";
} else {
    echo "Failed to delete non-empty directory. Remove content first.\n";
}
?>