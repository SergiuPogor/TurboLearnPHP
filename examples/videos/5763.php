<?php
// This script demonstrates how to use openssl_private_decrypt()
// to decrypt data that was encrypted with a public key.

function decrypt_data($encrypted_data, $private_key) {
    // Create a variable to hold the decrypted data
    $decrypted_data = '';

    // Use openssl_private_decrypt() to decrypt the data
    if (openssl_private_decrypt($encrypted_data, 
        $decrypted_data, $private_key)) {
        return $decrypted_data; // Return the decrypted data
    } else {
        throw new Exception("Decryption failed.");
    }
}

// Example Usage
try {
    // Load the private key from a file
    $private_key_path = '/tmp/test/private_key.pem';
    $private_key = file_get_contents($private_key_path);

    // Simulated encrypted data (base64 encoded for example purposes)
    $encrypted_data = '...'; // Insert your base64 encoded data here

    // Decrypt the data
    $result = decrypt_data(base64_decode($encrypted_data), $private_key);

    // Output the decrypted data
    echo "Decrypted Data: " . $result . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
?>