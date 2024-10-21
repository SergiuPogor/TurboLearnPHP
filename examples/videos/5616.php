<?php

// Example 1: Basic usage of zip_entry_name() to retrieve file names

function listZipFileNames($zipFilePath) {
    // Open the ZIP file
    $zip = zip_open($zipFilePath);
    $fileNames = [];

    // Check if the ZIP file opened successfully
    if (is_resource($zip)) {
        // Loop through the entries in the ZIP file
        while ($zipEntry = zip_read($zip)) {
            // Get the name of the entry
            $fileName = zip_entry_name($zipEntry);
            $fileNames[] = $fileName;
        }
        zip_close($zip);
    } else {
        throw new Exception("Could not open ZIP file: $zipFilePath");
    }
    return $fileNames;
}

// Test the function with a sample ZIP file
$zipFilePath = '/tmp/test/input.zip';
$fileNames = listZipFileNames($zipFilePath);
echo "Files in ZIP: " . implode(", ", $fileNames) . "\n";

// Example 2: Handling ZIP entries with detailed information

function getZipEntryDetails($zipFilePath) {
    $zip = zip_open($zipFilePath);
    $entryDetails = [];

    if (is_resource($zip)) {
        while ($zipEntry = zip_read($zip)) {
            $fileName = zip_entry_name($zipEntry);
            $fileSize = zip_entry_filesize($zipEntry);
            $entryDetails[] = [
                'name' => $fileName,
                'size' => $fileSize,
                'compressed_size' => zip_entry_compressedsize($zipEntry)
            ];
        }
        zip_close($zip);
    } else {
        throw new Exception("Could not open ZIP file: $zipFilePath");
    }
    return $entryDetails;
}

// Fetch detailed information of entries in the ZIP file
$zipDetails = getZipEntryDetails($zipFilePath);
echo "ZIP Entry Details:\n";
print_r($zipDetails);

// Example 3: Filtering files by extension in ZIP

function getFilteredZipFiles($zipFilePath, $extension) {
    $zip = zip_open($zipFilePath);
    $filteredFiles = [];

    if (is_resource($zip)) {
        while ($zipEntry = zip_read($zip)) {
            $fileName = zip_entry_name($zipEntry);
            if (pathinfo($fileName, PATHINFO_EXTENSION) === $extension) {
                $filteredFiles[] = $fileName;
            }
        }
        zip_close($zip);
    } else {
        throw new Exception("Could not open ZIP file: $zipFilePath");
    }
    return $filteredFiles;
}

// Get all .txt files from the ZIP
$txtFiles = getFilteredZipFiles($zipFilePath, 'txt');
echo "Text Files in ZIP: " . implode(", ", $txtFiles) . "\n";

// Example 4: Batch processing multiple ZIP files

function batchProcessZipFiles($zipFilePaths) {
    $results = [];

    foreach ($zipFilePaths as $zipFilePath) {
        try {
            $results[$zipFilePath] = listZipFileNames($zipFilePath);
        } catch (Exception $e) {
            $results[$zipFilePath] = ['error' => $e->getMessage()];
        }
    }
    return $results;
}

// Sample array of ZIP file paths to analyze
$zipFilesToAnalyze = ['/tmp/test/input.zip', '/tmp/test/another.zip'];
$batchResults = batchProcessZipFiles($zipFilesToAnalyze);

echo "Batch Process Results:\n";
print_r($batchResults);

?>