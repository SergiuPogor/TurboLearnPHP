<?php
// PHP script to check and display current upload limits

// Get current PHP settings for file uploads
$currentUploadLimit = ini_get('upload_max_filesize');
$currentPostLimit = ini_get('post_max_size');

// Display current limits
echo "Current PHP upload file size limit: " . $currentUploadLimit . "\n"; // e.g., 2M
echo "Current PHP post size limit: " . $currentPostLimit . "\n"; // e.g., 8M

// Provide instructions for changing limits
echo "To increase limits, edit php.ini file:\n";
echo "1. Find the php.ini file in your PHP installation directory.\n";
echo "2. Change upload_max_filesize and post_max_size values.\n";
echo "3. Restart your web server for changes to take effect.\n";