<?php
// File path for the compressed file
$filePath = '/tmp/test/sample.txt.gz';

// Check if the file exists
if (file_exists($filePath)) {
    // Set headers for gzipped file
    header('Content-Type: application/octet-stream');
    header('Content-Encoding: gzip');
    header('Content-Length: ' . filesize($filePath));
    header('Content-Disposition: attachment; filename="sample.txt.gz"');

    // Open the compressed file for reading
    $file = fopen($filePath, 'rb');

    // Output buffering to control the output flow
    ob_start();

    // Stream the compressed file to the browser
    if ($file) {
        // Use gzpassthru to send compressed data
        gzpassthru(gzopen($filePath, 'rb'));
        fclose($file);
    }

    // Clean the output buffer and send the output
    ob_end_flush();
} else {
    echo "File not found.";
}
?>