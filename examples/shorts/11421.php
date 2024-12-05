<?php
// Example 1: Using require for critical dependencies
require '/tmp/test/config.php'; // App fails if this file is missing

// Example 2: Using include_once for reusable components
include_once '/tmp/test/helper.php'; // Prevents accidental re-inclusion

// Example 3: Comparison - require vs include_once in error handling
try {
    require '/tmp/test/important.php'; // Fatal error if missing
    echo "Critical file loaded successfully.\n";
} catch (Throwable $e) {
    echo "Require failed: " . $e->getMessage() . "\n";
}

// Safely including reusable modules
if (file_exists('/tmp/test/optional_module.php')) {
    include_once '/tmp/test/optional_module.php'; // Loads only once
    echo "Optional module loaded.\n";
}

// Example 4: Dynamic inclusion with include_once
$module = 'user_dashboard';
$path = "/tmp/test/modules/{$module}.php";

if (file_exists($path)) {
    include_once $path; // Dynamic, reusable, avoids duplication
    echo "Module '{$module}' included.\n";
} else {
    echo "Module '{$module}' not found.\n";
}

// Key takeaway: Use require for non-negotiable files and include_once for optional or reusable modules.
?>