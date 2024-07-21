// Example of configuring OpCache in PHP

// Ensure OpCache extension is enabled in php.ini

// Check if OpCache is enabled
if (extension_loaded('Zend OPcache')) {
    echo "OpCache is enabled!\n";
    
    // Get OpCache configuration
    $opcacheConfig = opcache_get_configuration();
    
    // Display configuration details
    echo "OpCache Memory Consumption: " . $opcacheConfig['directives']['opcache.memory_consumption'] . "\n";
    echo "OpCache Interned Strings Buffer: " . $opcacheConfig['directives']['opcache.interned_strings_buffer'] . "\n";
    
    // Check OpCache status
    $opcacheStatus = opcache_get_status();
    
    // Display status information
    echo "OpCache Status:\n";
    echo "  Memory Usage: " . $opcacheStatus['memory_usage']['used_memory'] . " / " . $opcacheStatus['memory_usage']['free_memory'] . "\n";
    echo "  Hits: " . $opcacheStatus['opcache_statistics']['hits'] . "\n";
    echo "  Misses: " . $opcacheStatus['opcache_statistics']['misses'] . "\n";
} else {
    echo "OpCache is not enabled. Please enable OpCache extension in php.ini.\n";
}