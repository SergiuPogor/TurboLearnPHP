<?php

// Establish FTP connection
$ftp = ftp_connect('ftp.example.com');
$login = ftp_login($ftp, 'user', 'password');

if (!$ftp || !$login) {
    die("FTP connection failed.");
}

// Local file to upload
$localFile = '/tmp/test/input.zip';
// Remote destination
$remoteFile = '/public_html/input.zip';

// Get file size in bytes
$fileSize = filesize($localFile);

// Method 1: Allocate space for the file before uploading (ftp_alloc)
$allocated = ftp_alloc($ftp, $fileSize, $result);
if ($allocated) {
    // Space was successfully allocated, proceed with upload
    echo "Space allocated: $result\n";
    if (ftp_put($ftp, $remoteFile, $localFile, FTP_BINARY)) {
        echo "File uploaded successfully using ftp_alloc.\n";
    } else {
        echo "File upload failed after ftp_alloc.\n";
    }
} else {
    // Space allocation failed, handle case here
    echo "Space allocation failed: $result\n";
    // Still try to upload, but be prepared for failure
    if (ftp_put($ftp, $remoteFile, $localFile, FTP_BINARY)) {
        echo "File uploaded without pre-allocation.\n";
    } else {
        echo "File upload failed without pre-allocation.\n";
    }
}

// Method 2: Skip ftp_alloc and rely on direct upload (but risk failure on large files)
if (ftp_put($ftp, $remoteFile, $localFile, FTP_BINARY)) {
    echo "File uploaded directly without ftp_alloc.\n";
} else {
    echo "File upload failed without ftp_alloc.\n";
}

// Method 3: Handling allocation manually by checking available disk space
$diskSpace = ftp_raw($ftp, "SITE HELP DISKSPACE");  // Not all FTP servers support this
if ($diskSpace) {
    echo "Available disk space: " . implode(", ", $diskSpace) . "\n";
    if (ftp_put($ftp, $remoteFile, $localFile, FTP_BINARY)) {
        echo "File uploaded after manual disk space check.\n";
    } else {
        echo "File upload failed after manual disk space check.\n";
    }
} else {
    echo "Failed to check available disk space.\n";
}

// Close FTP connection
ftp_close($ftp);

?>