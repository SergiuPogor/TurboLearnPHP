<?php

// Path to the PHP script to check
$script_path = '/tmp/test/sample_script.php';

// Check if the script is cached using opcache_is_script_cached
if (opcache_is_script_cached($script_path)) {
    echo "The script at '$script_path' is currently cached by OPcache.";
} else {
    echo "The script at '$script_path' is not cached by OPcache.";
}

// Example usage in a function
function checkScriptCache(string $scriptPath): bool {
    return opcache_is_script_cached($scriptPath);
}

// Use the function
$is_cached = checkScriptCache('/tmp/test/another_script.php');
if ($is_cached) {
    echo "The script is cached.";
} else {
    echo "The script is not cached.";
}

// Error handling for invalid paths
if (!file_exists($script_path)) {
    echo "Error: The specified script path does not exist.";
}

// Validate and debug caching status with dynamic path
$dynamic_script_path = '/tmp/test/dynamic_script.php';
if (opcache_is_script_cached($dynamic_script_path)) {
    echo "Dynamic script '$dynamic_script_path' is cached.";
} else {
    echo "Dynamic script '$dynamic_script_path' is not cached.";
}

?>