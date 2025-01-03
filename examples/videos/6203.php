<?php

// Example: Using gztell() to manage compressed data in PHP

// Step 1: Open a compressed file for writing
$filename = '/tmp/test/compressed.gz';
$gz = gzopen($filename, 'w');

// Check if the file is opened successfully
if (!$gz) {
    die("Could not open compressed file.");
}

// Step 2: Write data to the compressed file
$data = "This is some example data that needs to be compressed.\n";
$writtenBytes = gzwrite($gz, $data);

// Step 3: Use gztell() to get the current position in the stream
$currentPosition = gztell($gz);
echo "Current position in compressed stream: " . $currentPosition . " bytes\n";

// Step 4: Write more data and check the position again
$moreData = "Adding more data to see the change in position.\n";
$writtenBytes += gzwrite($gz, $moreData);
$currentPosition = gztell($gz);
echo "New position in compressed stream: " . $currentPosition . " bytes\n";

// Step 5: Close the compressed file
gzclose($gz);

// Step 6: Reopen the compressed file for reading
$gzRead = gzopen($filename, 'r');

// Check if the file is opened successfully for reading
if (!$gzRead) {
    die("Could not open compressed file for reading.");
}

// Step 7: Read data and use gztell() to monitor reading position
while (!gzeof($gzRead)) {
    $line = gzgets($gzRead);
    echo "Read line: " . $line;
    $currentPosition = gztell($gzRead);
    echo "Current reading position: " . $currentPosition . " bytes\n";
}

// Step 8: Close the file after reading
gzclose($gzRead);

?>