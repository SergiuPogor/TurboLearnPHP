<?php

// Example: Using sodium_crypto_scalarmult_ristretto255_base() for secure key exchange in real-time communication

// Generate a random scalar (private key)
$private_key = random_bytes(SODIUM_CRYPTO_SCALARMULT_RISTRETTO255_SCALARBYTES);

// Calculate the corresponding public key using sodium_crypto_scalarmult_ristretto255_base()
$public_key = sodium_crypto_scalarmult_ristretto255_base($private_key);

// Store the public key securely (could be in a database or shared with other users)
file_put_contents('/tmp/test/public_key.txt', $public_key);

// Function to generate a shared secret between two users
function generate_shared_secret($private_key, $peer_public_key) {
    $shared_secret = sodium_crypto_scalarmult($private_key, $peer_public_key);
    
    // Return hashed shared secret for added security
    return sodium_crypto_generichash($shared_secret);
}

// Example use-case in a real-time messaging app:
// User A wants to send a secure message to User B

// User B's public key (usually shared beforehand securely)
$peer_public_key = file_get_contents('/tmp/test/peer_public_key.txt');

// User A generates a shared secret using their private key and User B's public key
$shared_secret = generate_shared_secret($private_key, $peer_public_key);

// Encrypt a message using the shared secret
$message = "Secure message: Meet me at 3 PM.";
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$encrypted_message = sodium_crypto_secretbox($message, $nonce, $shared_secret);

// Store or send encrypted message and nonce to User B
file_put_contents('/tmp/test/encrypted_message.bin', $encrypted_message);
file_put_contents('/tmp/test/nonce.bin', $nonce);

// User B can decrypt the message with their private key and User A's public key
function decrypt_message($peer_public_key, $encrypted_message, $nonce, $private_key) {
    // Generate the shared secret again using private and peer's public key
    $shared_secret = generate_shared_secret($private_key, $peer_public_key);
    
    // Decrypt the message using the shared secret
    return sodium_crypto_secretbox_open($encrypted_message, $nonce, $shared_secret);
}

// In the same application, User B receives the encrypted message
$received_message = file_get_contents('/tmp/test/encrypted_message.bin');
$received_nonce = file_get_contents('/tmp/test/nonce.bin');

// User B decrypts the message
$decrypted_message = decrypt_message($peer_public_key, $received_message, $received_nonce, $private_key);

echo "Decrypted message: $decrypted_message\n";

// Multiple ways to use sodium_crypto_scalarmult_ristretto255_base():
// 1. Peer-to-peer chat: Generate shared secrets for secure messaging.
// 2. Encrypted file sharing: Encrypt files using shared secret keys between multiple users.
// 3. Asymmetric encryption: Use for session key exchange in secure web applications.

// Clean up: Remove sensitive keys and data
unlink('/tmp/test/public_key.txt');
unlink('/tmp/test/encrypted_message.bin');
unlink('/tmp/test/nonce.bin');

?>