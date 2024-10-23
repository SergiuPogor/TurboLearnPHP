<?php

function fetchMultipleUrls(array $urls): array {
    $results = [];
    $multiHandle = curl_multi_init();
    $shareHandle = curl_share_init();

    curl_share_setopt($shareHandle, CURLSHOPT_SHARE, CURL_LOCK_DATA_COOKIE);
    curl_share_setopt($shareHandle, CURLSHOPT_SHARE, CURL_LOCK_DATA_SSL_SESSION);

    // Set up each curl handle
    foreach ($urls as $url) {
        $curlHandle = curl_init($url);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_SHARE, $shareHandle); // Associate with shared handle
        curl_multi_add_handle($multiHandle, $curlHandle);
    }

    // Execute all queries simultaneously, blocking until complete
    do {
        $status = curl_multi_exec($multiHandle, $active);
        curl_multi_select($multiHandle);
    } while ($active && $status == CURLM_CALL_MULTI_PERFORM);

    // Collect results
    foreach ($urls as $index => $url) {
        $curlHandle = curl_multi_info_read($multiHandle)['handle'];
        $results[$url] = curl_multi_getcontent($curlHandle);
        curl_multi_remove_handle($multiHandle, $curlHandle);
        curl_close($curlHandle);
    }

    // Clean up shared resources
    curl_share_close($shareHandle); // Close shared handle
    curl_multi_close($multiHandle); // Close multi handle

    return $results;
}

// Example usage
$urlsToFetch = [
    "https://example.com/api/resource1",
    "https://example.com/api/resource2",
    "https://example.com/api/resource3"
];

try {
    $fetchedData = fetchMultipleUrls($urlsToFetch);
    print_r($fetchedData);
} catch (Exception $e) {
    echo "Error fetching URLs: " . $e->getMessage() . "\n";
}

// Bonus: Fetching different resources with different options
function fetchWithDifferentOptions(array $urls): array {
    $results = [];
    $multiHandle = curl_multi_init();
    
    foreach ($urls as $url) {
        $curlHandle = curl_init($url);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        
        // Example of setting different options for different URLs
        if (strpos($url, 'resource1') !== false) {
            curl_setopt($curlHandle, CURLOPT_TIMEOUT, 10);
        } else {
            curl_setopt($curlHandle, CURLOPT_FOLLOWLOCATION, true);
        }

        curl_multi_add_handle($multiHandle, $curlHandle);
    }

    // Execute all queries simultaneously, blocking until complete
    do {
        $status = curl_multi_exec($multiHandle, $active);
        curl_multi_select($multiHandle);
    } while ($active && $status == CURLM_CALL_MULTI_PERFORM);

    // Collect results
    foreach ($urls as $url) {
        $curlHandle = curl_multi_info_read($multiHandle)['handle'];
        $results[$url] = curl_multi_getcontent($curlHandle);
        curl_multi_remove_handle($multiHandle, $curlHandle);
        curl_close($curlHandle);
    }

    curl_multi_close($multiHandle); // Close multi handle
    return $results;
}

// Example usage with different options
$urlsToFetchWithOptions = [
    "https://example.com/api/resource1",
    "https://example.com/api/resource2",
    "https://example.com/api/resource3"
];

try {
    $fetchedDataWithOptions = fetchWithDifferentOptions($urlsToFetchWithOptions);
    print_r($fetchedDataWithOptions);
} catch (Exception $e) {
    echo "Error fetching URLs: " . $e->getMessage() . "\n";
}
?>