<?php

// File-based caching setup to optimize PHP page load times

// Define cache file and expiration time
$cacheFile = '/tmp/test/page_cache.html';
$cacheTime = 60 * 5; // Cache expires every 5 minutes

// Check if cached file exists and is still valid
if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    // Output cached content
    readfile($cacheFile);
    exit;
}

// Start output buffering to capture HTML output
ob_start();

// Main content logic (usually resource-intensive)
echo "<h1>Dynamic Content</h1>";
echo "<p>Generated at: " . date('Y-m-d H:i:s') . "</p>";
// Simulate heavy processing
usleep(500000);

// Capture the generated output and save to cache file
$content = ob_get_contents();
file_put_contents($cacheFile, $content);
ob_end_flush(); // Send output to browser

// Alternative caching technique: save a compressed version of the output
$compressedContent = gzencode($content);
file_put_contents('/tmp/test/page_cache.gz', $compressedContent);

?>