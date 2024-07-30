<?php

function getFileInfo($filePath)
{
    // Extract information about the file path
    $info = pathinfo($filePath);

    return [
        'dirname' => $info['dirname'] ?? '',
        'basename' => $info['basename'] ?? '',
        'extension' => $info['extension'] ?? '',
        'filename' => $info['filename'] ?? '',
    ];
}

// Example usage
$filePath = '/var/www/html/uploads/myfile.txt';

$fileInfo = getFileInfo($filePath);

echo "Directory Name: " . $fileInfo['dirname'] . PHP_EOL;
echo "Base Name: " . $fileInfo['basename'] . PHP_EOL;
echo "Extension: " . $fileInfo['extension'] . PHP_EOL;
echo "File Name: " . $fileInfo['filename'] . PHP_EOL;

?>