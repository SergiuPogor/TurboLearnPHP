<?php
// Example demonstrating how to use fopen() with different modes

// Open a file for reading
$fileRead = fopen('/tmp/test/input.txt', 'r');
if ($fileRead) {
    while (($line = fgets($fileRead)) !== false) {
        echo "Read line: $line\n";
    }
    fclose($fileRead);
} else {
    echo "Failed to open file for reading.\n";
}

// Open a file for writing (creates or overwrites the file)
$fileWrite = fopen('/tmp/test/output.txt', 'w');
if ($fileWrite) {
    fwrite($fileWrite, "Hello, World!\n");
    fwrite($fileWrite, "Writing data to the file.\n");
    fclose($fileWrite);
} else {
    echo "Failed to open file for writing.\n";
}

// Open a file for appending
$fileAppend = fopen('/tmp/test/output.txt', 'a');
if ($fileAppend) {
    fwrite($fileAppend, "Appending this line.\n");
    fclose($fileAppend);
} else {
    echo "Failed to open file for appending.\n";
}

// Open a file in binary mode for reading
$fileBinary = fopen('/tmp/test/input.zip', 'rb');
if ($fileBinary) {
    // Read binary data if needed
    // fclose() should be called after use
    fclose($fileBinary);
} else {
    echo "Failed to open binary file.\n";
}