// Example of using OpCache in PHP for performance optimization

// Check if OpCache is enabled
if (extension_loaded('Zend OPcache') && ini_get('opcache.enable')) {
    echo "OpCache is enabled.\n";
    
    // Retrieve OpCache configuration
    echo "OpCache Memory Consumption: " . ini_get('opcache.memory_consumption') . "\n";
    echo "OpCache Interned Strings Buffer: " . ini_get('opcache.interned_strings_buffer') . "\n";
    echo "OpCache Max Accelerated Files: " . ini_get('opcache.max_accelerated_files') . "\n";
    
    // Clear OpCache if needed
    // opcache_reset(); // Uncomment to clear OpCache (for demonstration)
} else {
    echo "OpCache is not enabled. Consider enabling it for better performance.\n";
}