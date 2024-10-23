<?php

// Case 1: Generating a private key and using openssl_pkey_free()

// Step 1: Generate a new private key
$keyConfig = [
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
];
$privateKeyResource = openssl_pkey_new($keyConfig);

// Step 2: Export the private key to a file for storage (optional)
openssl_pkey_export_to_file($privateKeyResource, '/tmp/test/private.pem');

// Step 3: Use the private key for encryption (example)
$dataToEncrypt = "Sensitive Data";
openssl_public_encrypt($dataToEncrypt, $encryptedData, $privateKeyResource);

// Step 4: Free the key resource after use
openssl_pkey_free($privateKeyResource);

// Case 2: Loading an existing private key from a file and freeing it

// Step 1: Load an existing private key from a file
$privateKey = file_get_contents('/tmp/test/private.pem');
$privateKeyResource = openssl_pkey_get_private($privateKey);

// Step 2: Sign some data with the private key
$dataToSign = "Data to sign";
openssl_sign($dataToSign, $signature, $privateKeyResource);

// Step 3: Free the key resource to avoid memory leaks
openssl_pkey_free($privateKeyResource);

// Case 3: Multiple keys in a loop - Demonstrating the need for openssl_pkey_free()

for ($i = 0; $i < 5; $i++) {
    // Generate a key in each iteration
    $tempKeyResource = openssl_pkey_new($keyConfig);
    
    // Encrypt something
    openssl_public_encrypt("Test Data {$i}", $encryptedData, $tempKeyResource);

    // Free the key resource after usage in each loop
    openssl_pkey_free($tempKeyResource);
}

// Case 4: Handling memory leak with long-running scripts

// Without openssl_pkey_free(), resources would pile up in long-running scripts.
// This is particularly dangerous for services or cron jobs that handle many keys over time.
function generateAndUseKey() {
    $keyConfig = ["private_key_bits" => 2048, "private_key_type" => OPENSSL_KEYTYPE_RSA];
    $key = openssl_pkey_new($keyConfig);
    openssl_public_encrypt("Encrypt This", $encrypted, $key);

    // Forgetting to free the key resource leads to memory leaks
    // openssl_pkey_free($key);  // This is essential in a long-running process
}

// Simulating repeated key generation
for ($i = 0; $i < 100; $i++) {
    generateAndUseKey();
    // With openssl_pkey_free() uncommented, memory usage will stay constant
}

?>