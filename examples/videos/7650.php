<?php

// Custom Exception class for better clarity
class CustomException extends Exception {
    public function errorMessage() {
        // Error message
        return "Error on line {$this->getLine()} in {$this->getFile()}: {$this->getMessage()}";
    }
}

// Function to demonstrate exception handling
function processFile($filePath) {
    try {
        if (!file_exists($filePath)) {
            // Throwing a custom exception
            throw new CustomException("File not found: $filePath");
        }

        // Simulate file processing
        $content = file_get_contents($filePath);
        if ($content === false) {
            throw new Exception("Could not read file: $filePath");
        }

        // Process content (mock)
        // ...

    } catch (CustomException $ce) {
        // Handle custom exceptions
        echo $ce->errorMessage();
    } catch (Exception $e) {
        // Handle general exceptions
        echo "General error: " . $e->getMessage();
    } finally {
        // Clean up resources, if any
        echo "Cleaning up resources.";
    }
}

// Example of calling the function with a non-existent file
processFile('/tmp/test/nonexistent.txt');

// Example of logging an exception
function logError($message) {
    file_put_contents('/tmp/test/error_log.txt', $message, FILE_APPEND);
}

// Call processFile with valid input
processFile('/tmp/test/input.txt');

// Call processFile with an actual file to simulate processing
// processFile('/tmp/test/valid_input.txt');
?>