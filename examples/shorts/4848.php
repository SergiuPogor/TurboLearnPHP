<?php
// Example to handle file uploads with error checking

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        
        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo 'File upload error: ' . $file['error'];
            exit;
        }
        
        // Check file size
        if ($file['size'] > 2 * 1024 * 1024) { // 2MB limit
            echo 'File is too large.';
            exit;
        }
        
        // Move the file to the desired directory
        $uploadDir = __DIR__ . '/uploads/';
        $uploadFile = $uploadDir . basename($file['name']);
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo 'File successfully uploaded.';
        } else {
            echo 'Failed to move uploaded file.';
        }
    } else {
        echo 'No file uploaded.';
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" value="Upload File" />
</form>