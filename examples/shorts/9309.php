<?php

// Example: Configure PHP for Larger POST Data

// Check current configuration
function checkPostSize() {
    echo "Current post_max_size: " . ini_get('post_max_size') . "\n";
    echo "Current upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
}

// Function to update php.ini settings (example usage)
function updatePhpIni($filePath) {
    // This function would require appropriate permissions
    $iniContent = file_get_contents($filePath);
    $iniContent = preg_replace('/post_max_size\s*=\s*\d+[KMG]?/', 'post_max_size = 20M', $iniContent);
    $iniContent = preg_replace('/upload_max_filesize\s*=\s*\d+[KMG]?/', 'upload_max_filesize = 20M', $iniContent);
    file_put_contents($filePath, $iniContent);
    echo "Updated php.ini settings for larger POST data.\n";
}

// Usage
checkPostSize(); // Check current sizes
// updatePhpIni('/path/to/php.ini'); // Uncomment to run, requires correct path and permissions

?>