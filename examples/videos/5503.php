<?php

// Function to demonstrate the use of opcache_reset()
function demonstrateOpcacheReset() {
    // Simulate code change that requires cache reset
    $file = '/tmp/test/input.txt';
    
    // Check if the file exists
    if (!file_exists($file)) {
        throw new Exception('Input file does not exist.');
    }
    
    // Read the file content
    $content = file_get_contents($file);
    
    // Log original content
    echo "Original file content:\n$content\n";
    
    // Example: Reset OPcache
    opcache_reset();
    
    // Read the file content again after reset
    $newContent = file_get_contents($file);
    
    // Log new content after cache reset
    echo "File content after OPcache reset:\n$newContent\n";
}

// Example usage
try {
    demonstrateOpcacheReset();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

// Another example: Handling updates during development
function handleScriptUpdate() {
    // Check if we need to clear OPcache
    if (opcache_get_status()['opcache_enabled']) {
        echo "Clearing OPcache for development...\n";
        opcache_reset();
    } else {
        echo "OPcache is not enabled.\n";
    }
}

// Example usage
handleScriptUpdate();

// Advanced example: Automated cache clearing during deployment
function deployApplication() {
    // Simulate deployment process
    echo "Deploying new version...\n";
    
    // Reset OPcache to ensure new code is loaded
    opcache_reset();
    
    // Confirm deployment
    echo "Deployment complete. OPcache has been reset.\n";
}

// Example usage
deployApplication();
?>