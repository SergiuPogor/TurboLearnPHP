<?php

// Example of using include_once vs require_once

// Using include_once
include_once 'optional-file.php'; // This file is not critical
echo "This runs even if optional-file.php is missing.";

// Using require_once
require_once 'essential-file.php'; // This file is critical
echo "This will not run if essential-file.php is missing.";

// Demonstration of error handling
if (file_exists('optional-file.php')) {
    include_once 'optional-file.php';
} else {
    echo "Optional file not found, but we continue.";
}

try {
    require_once 'essential-file.php'; // Fatal error if not found
} catch (Error $e) {
    echo "Caught error: " . $e->getMessage();
}

?>