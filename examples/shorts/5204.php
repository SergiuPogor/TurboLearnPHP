<?php
// Start output buffering
ob_start();

// Output some content
echo "Content that will be discarded.";

// Discard the output buffer and turn off buffering
ob_end_clean();

// Output more content
echo "This content will be sent directly to the browser.";

// Further operations can continue here
?>