// Example PHP code for handling large file uploads with chunking

// Define upload directory and maximum chunk size
$uploadDir = 'uploads/';
$chunkSize = 1 * 1024 * 1024; // 1 MB chunk size

// Retrieve chunk information
$currentChunk = isset($_POST['chunk']) ? (int)$_POST['chunk'] : 0;
$totalChunks = isset($_POST['chunks']) ? (int)$_POST['chunks'] : 1;

// Ensure the upload directory exists
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle chunked file upload
$targetFile = $uploadDir . basename($_FILES['file']['name']);
$incompleteFilePath = $targetFile . '.part';

// Append incoming chunk to the incomplete file
if ($out = fopen($incompleteFilePath, $currentChunk == 0 ? 'wb' : 'ab')) {
    if ($in = fopen($_FILES['file']['tmp_name'], 'rb')) {
        fseek($in, $currentChunk * $chunkSize);
        stream_copy_to_stream($in, $out, $chunkSize);
        fclose($in);
    }
    fclose($out);
}

// If all chunks have been uploaded, finalize the file
if ($currentChunk == $totalChunks - 1) {
    rename($incompleteFilePath, $targetFile);
    echo 'File uploaded successfully!';
} else {
    echo 'Chunk ' . ($currentChunk + 1) . ' of ' . $totalChunks . ' uploaded.';
}