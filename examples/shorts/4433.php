// Example of using OpCache in PHP for performance optimization

// Check if OpCache is enabled
if (extension_loaded('Zend OPcache')) {
    echo "OpCache is enabled!\n";
} else {
    echo "OpCache is not enabled. Enable OpCache for better performance.\n";
}

// Get OpCache status
$status = opcache_get_status();
echo "OpCache memory usage: " . round($status['memory_usage']['used_memory'] / 1024 / 1024, 2) . " MB\n";
echo "OpCache hit rate: " . round($status['opcache_statistics']['opcache_hit_rate'], 2) . "%\n";