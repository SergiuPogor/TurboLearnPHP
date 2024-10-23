<?php

// Check if mhash is available
if (function_exists('mhash_count')) {
    // Get the number of hashing algorithms available
    $hashCount = mhash_count();
    echo "There are $hashCount hashing algorithms available in this PHP installation.\n";
    
    // List available hashing algorithms
    for ($i = 0; $i < $hashCount; $i++) {
        $algorithm = mhash_algorithms()[$i]; // Get the algorithm name
        echo "Algorithm $i: $algorithm\n";
    }
    
    // Example of using a specific hashing algorithm
    $data = "This is a secret message.";
    $hashType = 2; // Let's say we choose the 'SHA256' algorithm (2)
    
    // Generate the hash
    $hashedData = mhash($hashType, $data);
    echo "Hashed Data: " . bin2hex($hashedData) . "\n"; // Display the hashed data in hexadecimal
    
} else {
    echo "The mhash extension is not available in this PHP installation.\n";
}
?>