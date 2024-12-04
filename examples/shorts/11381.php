<?php
// Example 1: Using unlink to delete a file
$file = '/tmp/test/sample.txt';
if (file_exists($file)) {
    unlink($file);
    echo "File deleted successfully!";
} else {
    echo "File does not exist.";
}

// Example 2: Using rmdir to delete an empty directory
$directory = '/tmp/test/empty_dir';
if (is_dir($directory) && count(scandir($directory)) == 2) { // Only . and ..
    rmdir($directory);
    echo "Directory deleted successfully!";
} else {
    echo "Directory is not empty or does not exist.";
}

// Example 3: Deleting a non-empty directory (unlink + rmdir)
$dirPath = '/tmp/test/non_empty_dir';
$files = array_diff(scandir($dirPath), array('.', '..'));
foreach ($files as $file) {
    unlink($dirPath . '/' . $file); // Deleting files inside
}
rmdir($dirPath); // Now delete the empty directory
echo "Non-empty directory deleted!";
?>