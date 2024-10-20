<?php

// Example: Using hash_copy() to duplicate a hash context in PHP

// Create a hash context for SHA-256
$originalHashContext = hash_init('sha256');

// Update the hash with some data
hash_update($originalHashContext, 'Hello, World!');

// Copy the hash context
$copiedHashContext = hash_copy($originalHashContext);

// Update the copied hash with different data
hash_update($copiedHashContext, 'Goodbye, World!');

// Get the original and copied hash values
$originalHash = hash_final($originalHashContext);
$copiedHash = hash_final($copiedHashContext);

// Display the hash outputs
echo "Original Hash: " . $originalHash . PHP_EOL;
echo "Copied Hash: " . $copiedHash . PHP_EOL;

// Clean up
hash_destroy($originalHashContext);
hash_destroy($copiedHashContext);

?>