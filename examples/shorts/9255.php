<?php
// Example: Using ob_start() to capture unexpected outputs and handle redirects smoothly

// Start output buffering
ob_start();

// Simulate dynamic content generation with unexpected output
echo "Logging data to output...";  // This would usually be unwanted in certain outputs

// Check file size before sending headers (prevents headers already sent error)
if (file_exists('/tmp/test/input.zip')) {
    $fileSize = filesize('/tmp/test/input.zip');
    header('Content-Length: ' . $fileSize);
    header('Content-Disposition: attachment; filename="download.zip"');
    header('Content-Type: application/zip');

    // Flush buffer content and load the file
    ob_clean();
    flush();
    readfile('/tmp/test/input.zip');
    exit;
}

// Using output buffering to catch potential errors in output-sensitive scenarios
try {
    // Generate some dynamic data that could throw unexpected output
    echo "Preparing user report...\n";

    // Critical code for redirect or header-sensitive processing
    if (!headers_sent()) {
        header('Location: /dashboard');
    }

    // Save any generated content to a variable before sending to the client
    $content = ob_get_contents();
} finally {
    // Clean up buffer regardless of success or error
    ob_end_clean();
}

// Log or handle the buffered content if necessary
file_put_contents('/tmp/test/output.log', $content);
?>