<?php

// Example: Using openssl_seal() to encrypt data securely in PHP

// Define the data to be encrypted
$dataToEncrypt = "This is a secret message that needs to be secured.";

// Generate a pair of public/private keys for encryption
$privateKey = openssl_pkey_new(['private_key_bits' => 2048]);
$publicKeyDetails = openssl_pkey_get_details($privateKey);
$publicKey = $publicKeyDetails['key'];

// Encrypt the data using openssl_seal
$sealedData = '';
$iv = '';
$encryptedKeys = [];
$sealResult = openssl_seal(
    $dataToEncrypt,
    $sealedData,
    $encryptedKeys,
    [$publicKey]  // Use the public key for encryption
);

// Check if encryption was successful
if ($sealResult === false) {
    die('Encryption failed: ' . openssl_error_string());
}

// The sealed data is base64 encoded for safe transfer
$sealedDataBase64 = base64_encode($sealedData);
$encryptedKeysBase64 = array_map('base64_encode', $encryptedKeys);

// Now, let's demonstrate how to decrypt the sealed data
// You would normally securely share the private key, but here we generate it for demonstration
openssl_pkey_export($privateKey, $privateKeyOut);

// Decrypt the sealed data using openssl_open
$decryptedData = '';
$decryptResult = openssl_open(
    base64_decode($sealedDataBase64),
    $decryptedData,
    base64_decode($encryptedKeysBase64[0]),  // Use the first encrypted key
    $privateKeyOut  // Use the private key for decryption
);

// Check if decryption was successful
if ($decryptResult === false) {
    die('Decryption failed: ' . openssl_error_string());
}

// Display the original message
echo "Original Message: " . $decryptedData;

// Clean up the keys
openssl_free_key($privateKey);

?>