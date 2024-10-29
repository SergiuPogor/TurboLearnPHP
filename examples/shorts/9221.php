<?php
// File path to large CSV file
$filePath = '/tmp/test/large_file.csv';

// Approach 1: Using fgetcsv() to read line by line
if (($handle = fopen($filePath, 'r')) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        // Process each row here
        [$id, $name, $email] = $data;
        echo "ID: $id, Name: $name, Email: $email\n";
    }
    fclose($handle);
}

// Approach 2: Using SplFileObject for more control and performance
$file = new SplFileObject($filePath);
$file->setFlags(SplFileObject::READ_CSV);

foreach ($file as $row) {
    // Only proceed if row data is not empty (to avoid blank rows)
    if ($row && !empty($row[0])) {
        [$id, $name, $email] = $row;
        echo "ID: $id, Name: $name, Email: $email\n";
    }
}

// Approach 3: Chunked processing to further limit memory use
function processInChunks($filePath, $chunkSize = 1000) {
    $handle = fopen($filePath, 'r');
    $batch = [];

    while (($row = fgetcsv($handle, 1000, ",")) !== false) {
        $batch[] = $row;
        
        if (count($batch) >= $chunkSize) {
            // Process each chunk
            foreach ($batch as $data) {
                [$id, $name, $email] = $data;
                echo "ID: $id, Name: $name, Email: $email\n";
            }
            // Clear batch memory
            $batch = [];
        }
    }

    // Process remaining rows
    foreach ($batch as $data) {
        [$id, $name, $email] = $data;
        echo "ID: $id, Name: $name, Email: $email\n";
    }

    fclose($handle);
}

processInChunks($filePath);
?>