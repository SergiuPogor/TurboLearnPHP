<?php

// Example of using mhash_keygen_s2k() to generate secure keys based on a password

// This function requires the mhash extension to be enabled.
// It is often used for cryptography and secure data handling.

$password = "securePassword123"; // The user-provided password
$salt = random_bytes(16); // Generate a random salt
$iterations = 1000; // Define the number of iterations for key generation
$hashAlgorithm = MHASH_SHA256; // Use SHA-256 as the hashing algorithm

// Generate a secure key using mhash_keygen_s2k
$secureKey = mhash_keygen_s2k($hashAlgorithm, $password, $salt, $iterations);

if ($secureKey !== false) {
    // Convert the binary key to a hexadecimal representation for storage
    $hexKey = bin2hex($secureKey);
    echo "Generated secure key: {$hexKey}\n";
} else {
    echo "Failed to generate secure key.\n";
}

// Storing the salt and the hashed key in a database would be the next step.
// Ensure you store the salt alongside the hash for later verification.

// Example of using the generated key for encryption
$dataToEncrypt = "Sensitive information goes here.";
$iv = random_bytes(16); // Initialization vector for encryption

// Encrypt the data using openssl_encrypt
$encryptedData = openssl_encrypt(
    $dataToEncrypt,
    'aes-256-cbc', // Encryption method
    $secureKey, // Use the secure key generated above
    0, // No options
    $iv // Use the generated IV
);

echo "Encrypted Data: " . base64_encode($encryptedData) . "\n";

// To decrypt, use the same key and IV
$decryptedData = openssl_decrypt(
    $encryptedData,
    'aes-256-cbc',
    $secureKey,
    0,
    $iv
);

echo "Decrypted Data: " . $decryptedData . "\n";