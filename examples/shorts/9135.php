<?php

// Function to get the file extension
function getFileExtension($filename) {
    // Use pathinfo to extract the file extension
    return pathinfo($filename, PATHINFO_EXTENSION);
}

// Example file names
$files = [
    'document.pdf',
    'image.jpeg',
    'archive.zip',
    'script.php',
    'no_extension_file'
];

// Loop through files and print their extensions
foreach ($files as $file) {
    $extension = getFileExtension($file);
    
    // Check if the extension exists
    if ($extension) {
        echo "The extension of '$file' is: $extension\n";
    } else {
        echo "'$file' has no extension.\n";
    }
}

?>