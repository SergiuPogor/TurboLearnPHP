// Example demonstrating secure file upload handling in PHP
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
    $uploadDir = '/path/to/secure/upload/directory/';
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);

    // Validate file type and size
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $maxFileSize = 5242880; // 5MB

    if (!in_array($_FILES['file']['type'], $allowedTypes)) {
        die('Invalid file type. Allowed types: JPEG, PNG, PDF.');
    }

    if ($_FILES['file']['size'] > $maxFileSize) {
        die('File size exceeds maximum limit of 5MB.');
    }

    // Move uploaded file to secure directory
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo 'File successfully uploaded.';
    } else {
        echo 'File upload failed. Please try again.';
    }
}