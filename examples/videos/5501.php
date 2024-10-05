<?php

// Load the existing private key with a passphrase
$passphrase = 'your-secure-passphrase'; // Replace with your actual passphrase
$privateKey = openssl_pkey_get_private(file_get_contents('/tmp/test/private_key.pem'), $passphrase);

if (!$privateKey) {
    throw new Exception('Failed to load private key: ' . openssl_error_string());
}

// Data to encrypt
$data = 'Sensitive information that needs encryption';

// Generate a symmetric AES key for encryption (256-bit AES key)
$aesKey = openssl_random_pseudo_bytes(32); // AES-256 requires 32 bytes (256 bits)

// Encrypt the data using AES-256-CBC
$iv = openssl_random_pseudo_bytes(16); // Initialization vector for AES (16 bytes for AES-256-CBC)
$encryptedData = openssl_encrypt($data, 'aes-256-cbc', $aesKey, OPENSSL_RAW_DATA, $iv);

if (!$encryptedData) {
    throw new Exception('AES encryption failed: ' . openssl_error_string());
}

// Encrypt the AES key using the private RSA key
$encryptedKey = '';
if (!openssl_private_encrypt($aesKey, $encryptedKey, $privateKey)) {
    throw new Exception('RSA encryption of AES key failed: ' . openssl_error_string());
}

// Output encrypted components
echo "Encrypted Data: " . base64_encode($encryptedData) . "\n";
echo "Encrypted AES Key: " . base64_encode($encryptedKey) . "\n";
echo "IV: " . base64_encode($iv) . "\n";

// Decrypt the AES key using the private RSA key
$decryptedAESKey = '';
if (!openssl_private_decrypt($encryptedKey, $decryptedAESKey, $privateKey)) {
    throw new Exception('RSA decryption of AES key failed: ' . openssl_error_string());
}

// Ensure the decrypted AES key is the correct length (32 bytes for AES-256)
if (strlen($decryptedAESKey) !== 32) {
    throw new Exception('Decrypted AES key length is invalid. Expected 32 bytes, got ' . strlen($decryptedAESKey));
}

// Decrypt the data using the decrypted AES key and IV
$decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $decryptedAESKey, OPENSSL_RAW_DATA, $iv);

if (!$decryptedData) {
    throw new Exception('AES decryption failed: ' . openssl_error_string());
}

// Output the original decrypted data
echo "Decrypted Data: " . $decryptedData . "\n";

?>

