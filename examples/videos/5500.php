<?php

// FTP connection details
$ftp_server = 'ftp.example.com';
$ftp_user_name = 'username';
$ftp_user_pass = 'password';

// Establishing FTP connection
$ftp_conn = ftp_connect($ftp_server);

// Login to FTP server
$login = ftp_login($ftp_conn, $ftp_user_name, $ftp_user_pass);

// Check connection and login
if (!$ftp_conn || !$login) {
    die("FTP connection or login failed!");
}

// Function to list files in a directory
function listFiles(string $directory): array {
    global $ftp_conn;
    return ftp_nlist($ftp_conn, $directory);
}

// Retrieve files from the root directory
$files = listFiles('/');

// Print the files
foreach ($files as $file) {
    echo "Found file or directory: $file\n";
}

// Example: List files in a specific directory
$directory = '/path/to/directory';
$filesInDir = listFiles($directory);
foreach ($filesInDir as $file) {
    echo "File in $directory: $file\n";
}

// Close the FTP connection
ftp_close($ftp_conn);

?>