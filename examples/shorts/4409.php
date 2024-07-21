<?php

// Example: Reading a large file using PHP streams
$file = 'large_file.txt';
$stream = fopen($file, 'r');

if ($stream) {
    while (!feof($stream)) {
        $chunk = fread($stream, 1024); // Read 1KB chunk
        // Process the chunk (e.g., manipulate data)
        echo $chunk; // Output or manipulate the chunk
    }
    fclose($stream); // Close the stream
} else {
    echo "Failed to open file.";
}

?>