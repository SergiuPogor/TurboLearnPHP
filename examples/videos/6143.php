<?php
// Function to demonstrate openssl_dh_compute_key() for key exchange
function computeSharedSecret($privateKey, $publicKey) {
    // Compute the shared secret using the private key and the peer's public key
    $sharedSecret = openssl_dh_compute_key($publicKey, $privateKey);
    
    if ($sharedSecret === false) {
        throw new Exception("Failed to compute shared secret: " . openssl_error_string());
    }

    return $sharedSecret;
}

// Generate Diffie-Hellman parameters
$dh = openssl_dh_compute_key(openssl_random_pseudo_bytes(32));
$privateKey = openssl_dh_compute_key($dh);

// Assume we have a public key from another party
$peerPublicKey = openssl_random_pseudo_bytes(32); // Replace with actual public key

try {
    // Compute the shared secret
    $sharedSecret = computeSharedSecret($privateKey, $peerPublicKey);
    echo "Shared secret computed successfully!\n";
    echo "Shared Secret: " . bin2hex($sharedSecret) . "\n"; // Display as hex for readability
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Clean up keys
openssl_free_key($dh);
?>