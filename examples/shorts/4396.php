<?php
// Example of handling file upload securely

// Check if a file was uploaded
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    if (!in_array($_FILES['file']['type'], $allowedTypes)) {
        die('Invalid file type.');
    }

    // Validate file size (example: max 5MB)
    $maxFileSize = 5 * 1024 * 1024; // 5MB
    if ($_FILES['file']['size'] > $maxFileSize) {
        die('File size exceeds limit.');
    }

    // Generate unique filename
    $uploadDir = '/path/to/upload/directory/';
    $fileName = uniqid('file_', true) . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    // Move the uploaded file to a secure location
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $fileName)) {
        echo 'File uploaded successfully.';
    } else {
        echo 'Failed to upload file.';
    }
} else {
    echo 'File upload error: ' . $_FILES['file']['error'];
}
?>