// Example of PHP try-catch block for error handling
try {
    $file = 'non_existing_file.txt';
    $content = file_get_contents($file);
    if ($content === false) {
        throw new Exception("Failed to read file '{$file}'.");
    }
    echo "File content: {$content}";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}