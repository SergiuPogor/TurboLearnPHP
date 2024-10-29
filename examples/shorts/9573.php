<?php
// Define the upload directory
$uploadDir = '/tmp/test/';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file is uploaded
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = mime_content_type($fileTmpPath);
        
        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        if (!in_array($fileType, $allowedTypes)) {
            die('Error: Invalid file type.');
        }

        // Validate file size (limit to 2MB)
        if ($fileSize > 2 * 1024 * 1024) {
            die('Error: File size exceeds the limit.');
        }

        // Move the uploaded file to the designated directory
        $destinationPath = $uploadDir . basename($fileName);
        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo 'File successfully uploaded!';
        } else {
            echo 'Error: Could not move the file.';
        }
    } else {
        echo 'Error: No file uploaded or there was an upload error.';
    }
}
?>