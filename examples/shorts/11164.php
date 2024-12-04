<?php
// Example using include - the script continues even if the file is not found
if (file_exists('/tmp/test/config.php')) {
    include '/tmp/test/config.php';
} else {
    echo "Config file not found, but script continues.\n";
}

// Example using require - the script stops if the file is not found
if (file_exists('/tmp/test/essential.php')) {
    require '/tmp/test/essential.php';
} else {
    echo "Essential file missing, but this will not run.\n";
}

// Error handling with require that causes a fatal error
try {
    require '/tmp/test/critical.php';
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}\n";
}

// Use include for optional files
include '/tmp/test/optional.php'; // If this file is missing, the script will continue without error
?>