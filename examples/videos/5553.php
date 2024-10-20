<?php

// This script demonstrates how to use ftp_nb_continue() for non-blocking FTP file transfers.

$ftpServer = 'ftp.example.com';
$ftpUser = 'your_username';
$ftpPass = 'your_password';
$localFile = '/tmp/test/input.txt'; // Local file to upload
$remoteFile = 'uploaded_file.txt'; // File name on the FTP server

// Connect to the FTP server
$connId = ftp_connect($ftpServer);
if (!$connId) {
    die("Could not connect to the FTP server.");
}

// Login to the FTP server
if (!ftp_login($connId, $ftpUser, $ftpPass)) {
    die("Could not log in to the FTP server.");
}

// Set passive mode
ftp_pasv($connId, true);

// Begin a non-blocking file upload
$upload = ftp_nb_put($connId, $remoteFile, $localFile, FTP_BINARY);
while ($upload == FTP_MOREDATA) {
    // Continue the upload
    $upload = ftp_nb_continue($connId);
    
    // Here, you can add any additional logic, e.g., showing progress
    echo "Upload in progress...\n";
}

// Check the result of the upload
if ($upload != FTP_FINISHED) {
    echo "Failed to upload file.\n";
} else {
    echo "File uploaded successfully!\n";
}

// Close the connection
ftp_close($connId);