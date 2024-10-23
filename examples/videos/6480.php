<?php

// Load the sodium library
if (!function_exists('sodium_crypto_box_secretkey')) {
    die("Sodium library is not available.");
}

// Generate a keypair for public-key cryptography
$keypair = sodium_crypto_box_keypair();

// Extract the public key
$publicKey = sodium_crypto_box_publickey($keypair);

// Extract the secret key
$secretKey = sodium_crypto_box_secretkey($keypair);

// Example usage: Encrypt a message
$message = "This is a secret message.";
$nonce = random_bytes(SODIUM_CRYPTO_BOX_NONCEBYTES);

// Encrypt the message using the public key and secret key
$encryptedMessage = sodium_crypto_box($message, $nonce, $keypair);

// Decrypting the message on the receiver's side
$decryptedMessage = sodium_crypto_box_open($encryptedMessage, $nonce, $keypair);

// Display results
echo "Original Message: " . $message . "\n";
echo "Encrypted Message: " . bin2hex($encryptedMessage) . "\n";
echo "Decrypted Message: " . $decryptedMessage . "\n";

// Demonstrating secret key usage
echo "Secret Key: " . bin2hex($secretKey) . "\n";

// Clean up sensitive data
sodium_memzero($message);
sodium_memzero($encryptedMessage);
sodium_memzero($decryptedMessage);
sodium_memzero($secretKey);

?>