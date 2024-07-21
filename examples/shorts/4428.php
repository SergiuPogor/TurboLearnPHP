// Example of using PHP's SplFileInfo for file handling

// Create SplFileInfo object
$fileInfo = new SplFileInfo('/path/to/your/file.txt');

// Retrieve file information
echo "File Name: " . $fileInfo->getFilename() . "\n";
echo "File Size: " . $fileInfo->getSize() . " bytes\n";
echo "File Path: " . $fileInfo->getRealPath() . "\n";

// Check if file exists
if ($fileInfo->isFile()) {
    echo "File exists.\n";
} else {
    echo "File does not exist.\n";
}