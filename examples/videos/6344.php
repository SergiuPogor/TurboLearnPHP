<?php

// Load a private key from a PEM file
$privateKeyFile = '/tmp/test/private_key.pem';
$privateKeyPassword = 'your-password-here'; // Replace with your private key password

// Read the PEM file
$privateKeyPEM = file_get_contents($privateKeyFile);

// Retrieve the private key
$privateKey = openssl_pkey_get_private($privateKeyPEM, $privateKeyPassword);

if ($privateKey === false) {
    die("Failed to get private key: " . openssl_error_string());
}

// Example: Encrypting data using the private key
$dataToEncrypt = "Sensitive data that needs protection.";

// Encrypt data
if (openssl_private_encrypt($dataToEncrypt, $encryptedData, $privateKey)) {
    echo "Data encrypted successfully.\n";
} else {
    die("Encryption failed: " . openssl_error_string());
}

// To demonstrate decryption, we need to retrieve the public key
$publicKey = openssl_pkey_get_details($privateKey)['key'];

// Example: Decrypting data using the public key
if (openssl_public_decrypt($encryptedData, $decryptedData, $publicKey)) {
    echo "Decrypted data: $decryptedData\n";
} else {
    die("Decryption failed: " . openssl_error_string());
}

// Clean up
openssl_free_key($privateKey);
?>