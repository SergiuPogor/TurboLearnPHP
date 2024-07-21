<?php

function readLargeFile($filePath)
{
    $handle = fopen($filePath, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            yield $line;
        }
        fclose($handle);
    } else {
        throw new Exception("Unable to open file!");
    }
}

$filePath = "largefile.txt";

// Using the generator to process the file line by line
foreach (readLargeFile($filePath) as $line) {
    echo $line; // Process the line
}

?>