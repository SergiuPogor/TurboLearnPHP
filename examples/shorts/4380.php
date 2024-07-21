// Example PHP code for handling large file uploads

// Increase file upload size limits in php.ini
// upload_max_filesize = 20M
// post_max_size = 25M

// Server-side PHP handling
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_file'])) {
    $upload_errors = [];
    $file = $_FILES['uploaded_file'];
    
    // Check file size
    if ($file['size'] > 20 * 1024 * 1024) {
        $upload_errors[] = "File size exceeds limit.";
    }
    
    // Check file type
    $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
    if (!in_array($file['type'], $allowed_types)) {
        $upload_errors[] = "Unsupported file type.";
    }
    
    // Handle upload if no errors
    if (empty($upload_errors)) {
        $upload_path = '/path/to/upload/directory/' . $file['name'];
        if (move_uploaded_file($file['tmp_name'], $upload_path)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        foreach ($upload_errors as $error) {
            echo $error . "\n";
        }
    }
}