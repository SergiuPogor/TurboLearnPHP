<?php

// Include the Sodium library
if (!extension_loaded('sodium')) {
    die("The Sodium extension is required.");
}

// Function to generate and display a secure key for secret streaming
function generateSecureKey() {
    // Generate a secure key using sodium_crypto_secretstream_xchacha20poly1305_keygen()
    $key = sodium_crypto_secretstream_xchacha20poly1305_keygen();
    
    // Display the key in hexadecimal format
    return bin2hex($key);
}

// Function to encrypt data using a secret stream
function encryptData($key, $plaintext) {
    // Initialize the secret stream with the generated key
    $stream = sodium_crypto_secretstream_xchacha20poly1305_init_push($key);
    
    // Encrypt the data
    $ciphertext = sodium_crypto_secretstream_xchacha20poly1305_push(
        $stream,
        $plaintext,
        'sodium' // Use 'sodium' as the associated data
    );
    
    // Close the stream
    sodium_crypto_secretstream_xchacha20poly1305_push($stream, '', Sodium\Crypto\Secretstream\XChaCha20Poly1305::TAG_FINAL);
    
    return $ciphertext;
}

// Function to decrypt data using the same key
function decryptData($key, $ciphertext) {
    // Initialize the secret stream for decryption
    $stream = sodium_crypto_secretstream_xchacha20poly1305_init_pull($key, $ciphertext);
    
    // Decrypt the data
    $plaintext = sodium_crypto_secretstream_xchacha20poly1305_pull($stream, $ciphertext, $tag);
    
    return $plaintext;
}

// Example usage
$dataToEncrypt = "This is a secret message.";
$generatedKey = generateSecureKey();
$encryptedData = encryptData(hex2bin($generatedKey), $dataToEncrypt);
$decryptedData = decryptData(hex2bin($generatedKey), $encryptedData);

echo "Generated Key: $generatedKey\n";
echo "Encrypted Data: " . bin2hex($encryptedData) . "\n";
echo "Decrypted Data: $decryptedData\n";

?>