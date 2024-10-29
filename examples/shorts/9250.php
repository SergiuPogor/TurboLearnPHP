<?php
// Secure file upload example in PHP

// Directory to store uploaded files
$uploadDir = '/tmp/test/uploads/';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file is uploaded
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['fileToUpload'];

        // Validate file type (allow only images)
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            die('Invalid file type. Only JPG, PNG, and GIF files are allowed.');
        }

        // Check file size (limit to 2MB)
        if ($file['size'] > 2 * 1024 * 1024) {
            die('File size exceeds the limit of 2MB.');
        }

        // Create unique file name to prevent overwriting
        $fileName = uniqid('', true) . '-' . basename($file['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo 'File uploaded successfully: ' . htmlspecialchars($fileName);
        } else {
            echo 'Error moving the uploaded file.';
        }
    } else {
        echo 'No file uploaded or upload error.';
    }
}
?>

<!-- HTML form for file upload -->
<form action="" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" required>
    <input type="submit" value="Upload File">
</form>