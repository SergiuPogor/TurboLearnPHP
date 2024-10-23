<?php

// Check if the required files exist
$inputFilePath = '/tmp/test/input.txt';
$inputZipPath = '/tmp/test/input.zip';

if (!file_exists($inputFilePath) || !file_exists($inputZipPath)) {
    die('Required files are missing. Please check the paths.');
}

// Generate a random key and nonce for encryption
$key = sodium_crypto_secretbox_keygen(); // Generate a key
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES); // Generate a nonce

// Encrypt data using sodium_crypto_secretbox
function encryptData($data, $key, $nonce) {
    return sodium_crypto_secretbox($data, $nonce, $key);
}

// Example input data from file
$inputData = file_get_contents($inputFilePath);

// Encrypt the input data
$encryptedData = encryptData($inputData, $key, $nonce);

// Store encrypted data and nonce in a file
file_put_contents('/tmp/test/encrypted_data.bin', $encryptedData);
file_put_contents('/tmp/test/nonce.bin', $nonce);

// Function to decrypt data
function decryptData($encryptedData, $key, $nonce) {
    return sodium_crypto_secretbox_open($encryptedData, $nonce, $key);
}

// Read the encrypted data back from the file
$encryptedDataFromFile = file_get_contents('/tmp/test/encrypted_data.bin');
$nonceFromFile = file_get_contents('/tmp/test/nonce.bin');

// Attempt to decrypt the data
try {
    $decryptedData = decryptData($encryptedDataFromFile, $key, $nonceFromFile);
    if ($decryptedData === false) {
        throw new Exception('Decryption failed: Invalid key or nonce.');
    }
    echo "Decrypted data:\n" . $decryptedData;
} catch (Exception $e) {
    echo $e->getMessage();
}

?>