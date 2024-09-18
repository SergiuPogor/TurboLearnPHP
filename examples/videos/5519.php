<?php

// Function to display OPcache status
function displayOpCacheStatus() {
    // Retrieve OPcache status
    $status = opcache_get_status();
    
    // Check if OPcache is enabled
    if (!$status) {
        echo "OPcache is not enabled." . PHP_EOL;
        return;
    }
    
    // Display basic OPcache information
    echo "OPcache Status:" . PHP_EOL;
    echo "OPcache Enabled: " . ($status['opcache_enabled'] ? 'Yes' : 'No') . PHP_EOL;
    echo "Cache Hits: " . $status['opcache_statistics']['hits'] . PHP_EOL;
    echo "Cache Misses: " . $status['opcache_statistics']['misses'] . PHP_EOL;
    echo "Memory Used: " . $status['memory_usage']['used_memory'] . " bytes" . PHP_EOL;
    echo "Memory Free: " . $status['memory_usage']['free_memory'] . " bytes" . PHP_EOL;
    echo "Cache Full: " . ($status['memory_usage']['used_memory'] >= $status['memory_usage']['total_memory'] ? 'Yes' : 'No') . PHP_EOL;

    // Additional debugging information
    echo "Interned Strings Count: " . $status['interned_strings_usage']['string_count'] . PHP_EOL;
    echo "Interned Strings Memory: " . $status['interned_strings_usage']['memory_usage'] . " bytes" . PHP_EOL;
}

// Call the function to display OPcache status
displayOpCacheStatus();

?>