<?php
// Define upload directory and chunk size
$uploadDir = 'uploads/';
$chunkSize = 1024 * 1024; // 1MB

// Check if the request is for uploading a chunk
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    // Create a unique filename for the chunk
    $chunkFilename = $uploadDir . $_POST['filename'] . '.part' . $_POST['chunk_number'];
    
    // Move the uploaded chunk to the upload directory
    if (move_uploaded_file($file['tmp_name'], $chunkFilename)) {
        echo 'Chunk uploaded successfully!';
    } else {
        echo 'Error uploading chunk!';
    }
    
    // Check if all chunks are uploaded
    $totalChunks = $_POST['total_chunks'];
    $uploadedChunks = glob($uploadDir . $_POST['filename'] . '.part*');
    
    if (count($uploadedChunks) === (int)$totalChunks) {
        // Combine chunks into a single file
        $outputFile = $uploadDir . $_POST['filename'];
        $output = fopen($outputFile, 'wb');
        
        foreach ($uploadedChunks as $chunk) {
            $chunkData = file_get_contents($chunk);
            fwrite($output, $chunkData);
            unlink($chunk); // Delete the chunk after appending
        }
        
        fclose($output);
        echo 'File successfully assembled!';
    }
}
?>
<!-- HTML Form for uploading chunks -->
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="filename" value="my_large_file.zip">
    <input type="hidden" name="chunk_number" value="1">
    <input type="hidden" name="total_chunks" value="10">
    <input type="file" name="file">
    <button type="submit">Upload Chunk</button>
</form>