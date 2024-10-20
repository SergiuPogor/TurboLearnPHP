<?php

// Example: Using finfo_file() to detect the actual MIME type of files securely

// Initialize the fileinfo resource
$finfo = finfo_open(FILEINFO_MIME_TYPE);

// Path to files in the /tmp/test folder
$fileTxt = '/tmp/test/input.txt';
$fileZip = '/tmp/test/input.zip';

// Example use-cases in a real application:

// 1. Detect the MIME type of a text file
$mimeTxt = finfo_file($finfo, $fileTxt);
echo "MIME type of input.txt: $mimeTxt\n";

// 2. Detect the MIME type of a ZIP file
$mimeZip = finfo_file($finfo, $fileZip);
echo "MIME type of input.zip: $mimeZip\n";

// 3. Real-world scenario: Secure file upload validation
// Let's simulate validating an uploaded file
function validateUpload($filePath) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimeType = finfo_file($finfo, $filePath);
    
    // Allow only text files and ZIP archives
    $allowedTypes = ['text/plain', 'application/zip'];
    
    if (!in_array($mimeType, $allowedTypes)) {
        throw new Exception('Invalid file type detected: ' . $mimeType);
    }
    
    echo "Valid file type: $mimeType\n";
}

// Validate input.txt (expected to pass)
try {
    validateUpload($fileTxt);
} catch (Exception $e) {
    echo $e->getMessage();
}

// Validate input.zip (expected to pass)
try {
    validateUpload($fileZip);
} catch (Exception $e) {
    echo $e->getMessage();
}

// 4. Alternative approach: Using the finfo class for cleaner code
$finfoObj = new finfo(FILEINFO_MIME_TYPE);
$mimeTxtAlt = $finfoObj->file($fileTxt);
$mimeZipAlt = $finfoObj->file($fileZip);

echo "Alternative detection of input.txt: $mimeTxtAlt\n";
echo "Alternative detection of input.zip: $mimeZipAlt\n";

// 5. Handling multiple files with finfo_file
$files = [
    '/tmp/test/input.txt',
    '/tmp/test/input.zip'
];

foreach ($files as $file) {
    $mime = finfo_file($finfo, $file);
    echo "File: $file, MIME type: $mime\n";
}

// Close the fileinfo resource
finfo_close($finfo);

?>