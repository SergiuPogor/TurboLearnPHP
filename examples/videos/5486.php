<?php
// Checking if the file exists before processing
$file_path = '/tmp/test/input.txt';
if (!file_exists($file_path)) {
    die('File does not exist. Please upload a valid file.');
}

// Example 1: Using mime_content_type() to get the MIME type of a file
$mime_type = mime_content_type($file_path);
if ($mime_type === false) {
    die('Could not detect MIME type.');
}

// Basic security check: Allow only plain text files
$allowed_types = ['text/plain', 'application/pdf'];
if (!in_array($mime_type, $allowed_types, true)) {
    die('File type not allowed. Only plain text and PDF files are accepted.');
}

// Example 2: A more complex check with uploaded files
// Assuming a file upload from a user through a form
if (isset($_FILES['userfile'])) {
    $uploaded_file_path = $_FILES['userfile']['tmp_name'];

    if (!file_exists($uploaded_file_path)) {
        die('Uploaded file not found.');
    }

    $uploaded_mime_type = mime_content_type($uploaded_file_path);
    if ($uploaded_mime_type === false) {
        die('Failed to determine the MIME type of the uploaded file.');
    }

    // Log file type for audit purposes
    error_log("Uploaded file MIME type: $uploaded_mime_type");

    // Validate against a list of allowed MIME types
    $allowed_mime_types = [
        'image/jpeg', // JPEG images
        'image/png',  // PNG images
        'application/zip', // ZIP files
        'application/pdf'  // PDF documents
    ];

    if (!in_array($uploaded_mime_type, $allowed_mime_types, true)) {
        die('Uploaded file type not allowed.');
    }

    // Save the file to a secure location
    $destination = '/tmp/test/uploads/' . basename($_FILES['userfile']['name']);
    if (!move_uploaded_file($uploaded_file_path, $destination)) {
        die('Failed to move the uploaded file.');
    }

    echo 'File uploaded and validated successfully.';
}

// Example 3: Handling multiple file uploads securely
$files = ['input.txt', 'input.zip', 'report.pdf'];
foreach ($files as $file) {
    $path = "/tmp/test/$file";
    if (!file_exists($path)) {
        error_log("File $file does not exist, skipping.");
        continue;
    }

    $file_mime_type = mime_content_type($path);
    if ($file_mime_type === false) {
        error_log("Could not detect MIME type for $file, skipping.");
        continue;
    }

    if (!in_array($file_mime_type, $allowed_mime_types, true)) {
        error_log("File type $file_mime_type for $file is not allowed, skipping.");
        continue;
    }

    // Process the file (e.g., move to a secure directory)
    $secure_path = "/tmp/test/secure/" . basename($file);
    if (!copy($path, $secure_path)) {
        error_log("Failed to secure the file $file.");
    }
}

// Note: Always sanitize and validate filenames and paths to prevent directory traversal attacks.
?>