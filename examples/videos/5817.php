<?php

// Scenario: You need to encrypt sensitive data before sending it over the network, using
// a public-private key pair. You have the public key in a file and need to retrieve it
// dynamically using openssl_pkey_get_public() to handle encryption.

// Load public key from a file
$publicKeyFile = '/tmp/test/public_key.pem';  // Path to public key file
$publicKey = file_get_contents($publicKeyFile);

// Verify the key was loaded successfully
if ($publicKey === false) {
    throw new Exception("Failed to load the public key file!");
}

// Get the public key resource
$publicKeyResource = openssl_pkey_get_public($publicKey);

// Check if the key is valid
if ($publicKeyResource === false) {
    throw new Exception("Invalid public key format!");
}

// ----
// Let's encrypt some sensitive data using the public key. In this case, we are encrypting 
// a user's email address before transmitting it over the network.
$data = "user@example.com";

// Encrypt the data with the public key
$encryptedData = null;
if (!openssl_public_encrypt($data, $encryptedData, $publicKeyResource)) {
    throw new Exception("Data encryption failed!");
}

// Save encrypted data to a file for later use
file_put_contents('/tmp/test/encrypted_data.bin', $encryptedData);

// ----
// Now, let's explore an alternative method to retrieve the public key from a string.
// Sometimes, the public key is provided as a string (e.g., from a database or an API).

$publicKeyString = <<<EOD
-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA7vJbdGn6IxZahL+n7qIm
// ... Key truncated for brevity
-----END PUBLIC KEY-----
EOD;

// Get the public key resource from the string
$publicKeyResourceFromString = openssl_pkey_get_public($publicKeyString);

// Verify the key
if ($publicKeyResourceFromString === false) {
    throw new Exception("Invalid public key string format!");
}

// Encrypt some more data with the public key string
$dataToEncrypt = "supersecretdata123";
$encryptedStringData = null;
if (!openssl_public_encrypt($dataToEncrypt, $encryptedStringData, $publicKeyResourceFromString)) {
    throw new Exception("String data encryption failed!");
}

// Save the encrypted string data to a file
file_put_contents('/tmp/test/encrypted_string_data.bin', $encryptedStringData);

// ----
// Important: Always free the public key resources after use to avoid memory leaks.
openssl_free_key($publicKeyResource);
openssl_free_key($publicKeyResourceFromString);

// ----
// Extra: You can also dynamically switch between multiple public keys for different 
// purposes (e.g., user-specific encryption) in your application.
$publicKeys = [
    'user1' => openssl_pkey_get_public(file_get_contents('/tmp/test/user1_pubkey.pem')),
    'user2' => openssl_pkey_get_public(file_get_contents('/tmp/test/user2_pubkey.pem'))
];

// Encrypt data for specific user
$user = 'user1';
$encryptedUserData = null;
if (!openssl_public_encrypt($data, $encryptedUserData, $publicKeys[$user])) {
    throw new Exception("Encryption failed for user $user!");
}

file_put_contents("/tmp/test/{$user}_encrypted_data.bin", $encryptedUserData);

// Remember: Always ensure public key integrity and avoid exposing the keys.
?>