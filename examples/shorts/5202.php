<?php
// Start output buffering
ob_start();

// Output some content
echo "This is some initial content.";

// Intentionally add unwanted content
echo "Debug info: variable=123";

// Clear the output buffer, discarding the unwanted content
ob_clean();

// Output new content
echo "Content after clearing buffer.";

// End buffering and send output to the browser
ob_end_flush();
?>