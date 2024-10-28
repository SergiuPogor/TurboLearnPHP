<?php

// Custom exception handler to log exceptions in a centralized manner
set_exception_handler(function(Throwable $exception) {
    $logFile = '/tmp/test/error_log.txt';
    $message = date('Y-m-d H:i:s') . " - Error: " . $exception->getMessage() 
               . " in file " . $exception->getFile() 
               . " on line " . $exception->getLine() . PHP_EOL;
    
    file_put_contents($logFile, $message, FILE_APPEND);
    
    echo "An error occurred. Please check the log file.";
});

// Creating a custom exception for handling specific cases
class ZipFileException extends Exception {}

try {
    // Example 1: Reading a file
    $fileContent = file_get_contents('/tmp/test/input.txt');
    if (!$fileContent) {
        throw new Exception("File not found!");
    }

    // Example 2: Unzipping a file but throwing a custom exception if it fails
    $zip = new ZipArchive();
    if ($zip->open('/tmp/test/input.zip') !== true) {
        throw new ZipFileException("Failed to open ZIP file!");
    }
    
    // Extract files
    $zip->extractTo('/tmp/test/');
    $zip->close();
    
} catch (ZipFileException $e) {
    // Handle specific exception type
    echo "Custom Exception Caught: " . $e->getMessage();
    
} catch (Exception $e) {
    // General exception handling
    echo "General Exception: " . $e->getMessage();
}

// Reset exception handler to default
restore_exception_handler();