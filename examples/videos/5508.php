<?php

// Check if mhash extension is loaded
if (!extension_loaded('mhash')) {
    die('The mhash extension is not available.');
}

// Get the hash identifier for a specific algorithm
$hashId = MHASH_SHA256;

// Get the name of the hash algorithm from the identifier
$hashName = mhash_get_hash_name($hashId);

// Output the hash algorithm name
echo "Hash Algorithm Name: " . $hashName . PHP_EOL;

// Example of using the hash algorithm name in a hash operation
$data = 'Sample data for hashing';
$hash = mhash($hashId, $data);

// Display the hash value and name
echo "Hash Value: " . bin2hex($hash) . PHP_EOL;
echo "Algorithm Used: " . $hashName . PHP_EOL;

?>