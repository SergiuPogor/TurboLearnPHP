<?php
// Example 1: Using require() – stops execution on failure to load the file
// Simulating a missing file
$file = 'non_existent_file.php';
if (file_exists($file)) {
    require $file;  // This will trigger a fatal error if the file does not exist
} else {
    echo "File not found, but the script will stop!";
}

// Example 2: Using include() – allows the script to continue even if the file is not found
$file = 'non_existent_file.php';
if (file_exists($file)) {
    include $file;  // This will trigger a warning, but the script will continue
} else {
    echo "File not found, but the script continues!";
}
?>