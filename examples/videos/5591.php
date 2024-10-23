<?php

function downloadFileFromFtp(string $ftpServer, string $ftpUsername, string $ftpPassword, 
                               string $remoteFile, string $localFile): bool {
    // Connect to FTP server
    $ftpConnection = ftp_connect($ftpServer);
    if (!$ftpConnection) {
        throw new Exception("Could not connect to FTP server: $ftpServer");
    }

    // Login to FTP server
    $login = ftp_login($ftpConnection, $ftpUsername, $ftpPassword);
    if (!$login) {
        ftp_close($ftpConnection);
        throw new Exception("Could not log in to FTP server with user: $ftpUsername");
    }

    // Set passive mode
    ftp_pasv($ftpConnection, true);

    // Attempt to download the file
    if (!ftp_get($ftpConnection, $localFile, $remoteFile, FTP_BINARY)) {
        ftp_close($ftpConnection);
        throw new Exception("Failed to download $remoteFile to $localFile");
    }

    // Close the connection
    ftp_close($ftpConnection);
    return true;
}

// Example usage
$ftpServer = 'ftp.example.com';
$ftpUsername = 'username';
$ftpPassword = 'password';
$remoteFile = '/path/to/remote/file.txt';
$localFile = '/tmp/test/local_file.txt';

try {
    $result = downloadFileFromFtp($ftpServer, $ftpUsername, $ftpPassword, $remoteFile, $localFile);
    if ($result) {
        echo "File downloaded successfully to $localFile\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Bonus: Download multiple files
$remoteFiles = [
    '/path/to/remote/file1.txt',
    '/path/to/remote/file2.zip',
    '/path/to/remote/file3.jpg'
];

foreach ($remoteFiles as $file) {
    $localFile = '/tmp/test/' . basename($file);
    try {
        downloadFileFromFtp($ftpServer, $ftpUsername, $ftpPassword, $file, $localFile);
        echo "Downloaded: $file to $localFile\n";
    } catch (Exception $e) {
        echo "Error downloading $file: " . $e->getMessage() . "\n";
    }
}
?>