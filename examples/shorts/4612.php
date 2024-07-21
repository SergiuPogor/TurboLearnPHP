<?php

// Example: Secure File Upload Handling in PHP
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["upload"])) {
    $uploadDir = '/path/to/secure/upload/directory/';
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    // Check if upload directory exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadFile = $uploadDir . basename($_FILES['upload']['name']);
    $fileExtension = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    // Validate file extension
    if (!in_array($fileExtension, $allowedExtensions)) {
        die("Error: Invalid file extension.");
    }

    // Validate file size
    if ($_FILES['upload']['size'] > $maxFileSize) {
        die("Error: File size exceeds the limit.");
    }

    // Move uploaded file to secure directory
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadFile)) {
        echo "File is valid, and was successfully uploaded.";
    } else {
        echo "Upload failed.";
    }
}