<?php
// Start output buffering with zlib compression
ob_start('ob_gzhandler');

// Sample content to send to the client
echo "<h1>Welcome to My PHP Site!</h1>";
echo "<p>This content will be compressed using ob_gzhandler().</p>";
echo str_repeat("This is a sample repeated text to show compression. ", 50);

// Flush the output buffer and send it to the browser
ob_end_flush();
?>