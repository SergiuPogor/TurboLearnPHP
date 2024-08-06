<?php
// Set a time limit for the script execution
// Default time limit is 30 seconds, but this can be adjusted

// Extending time limit to 5 minutes (300 seconds)
set_time_limit(300);

// Simulate a long-running process
$file = '/tmp/test/input.txt';
if (file_exists($file)) {
    $handle = fopen($file, "r");
    while (!feof($handle)) {
        // Read and process file content
        $line = fgets($handle);
        // Simulate processing delay
        sleep(1); 
    }
    fclose($handle);
} else {
    echo "File not found.";
}

// Handling file upload (example for a zip file)
$uploadDir = '/tmp/test/';
$uploadedFile = $uploadDir . basename($_FILES['uploadedFile']['name']);
if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadedFile)) {
    echo "File uploaded successfully.";
} else {
    echo "File upload failed.";
}
?>