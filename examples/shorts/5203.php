<?php
// Start output buffering
ob_start();

// Output some content
echo "Initial content before flushing.";

// Flush the output buffer and turn off buffering
ob_end_flush();

// Output more content
echo "This content is sent immediately.";

// Further operations can continue here
?>