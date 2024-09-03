<?php

// Ensure the Sodium extension is available
if (!extension_loaded('sodium')) {
    die('The Sodium extension is not available. Please enable it in your PHP configuration.');
}

// Example 1: Generating a public key using sodium_crypto_kx_publickey()

// Generate a random secret key for a client
$clientSecretKey = sodium_crypto_kx_keypair();
$clientPublicKey = sodium_crypto_kx_publickey($clientSecretKey);

echo "Client's Public Key: " . bin2hex($clientPublicKey) . "\n";

// Example 2: Key exchange between client and server using sodium_crypto_kx()

// Generate key pairs for client and server
$serverSecretKey = sodium_crypto_kx_keypair();
$serverPublicKey = sodium_crypto_kx_publickey($serverSecretKey);

// Generate shared keys using the client's secret key and server's public key
$sharedKeyClient = sodium_crypto_kx_client_session_keys($clientSecretKey, $serverPublicKey);

// Generate shared keys using the server's secret key and client's public key
$sharedKeyServer = sodium_crypto_kx_server_session_keys($serverSecretKey, $clientPublicKey);

// Output the shared keys
echo "Client's Shared Key for Sending: " . bin2hex($sharedKeyClient['rx']) . "\n";
echo "Client's Shared Key for Receiving: " . bin2hex($sharedKeyClient['tx']) . "\n";
echo "Server's Shared Key for Sending: " . bin2hex($sharedKeyServer['rx']) . "\n";
echo "Server's Shared Key for Receiving: " . bin2hex($sharedKeyServer['tx']) . "\n";

// Example 3: Handling errors when generating keys

try {
    // Generate a secret key using a random seed
    $invalidSeed = random_bytes(SODIUM_CRYPTO_BOX_SEEDBYTES + 1); // Invalid seed length
    $keypair = sodium_crypto_kx_seed_keypair($invalidSeed); // Will throw an exception
} catch (Exception $e) {
    echo "Error during key generation: " . $e->getMessage() . "\n";
}

// Example 4: Combining sodium_crypto_kx_publickey with encryption

// Client encrypts a message using the shared key
$originalMessage = "Hello, secure world!";
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$encryptedMessage = sodium_crypto_secretbox($originalMessage, $nonce, $sharedKeyClient['tx']);

echo "Encrypted message from client to server: " . bin2hex($encryptedMessage) . "\n";

// Server decrypts the message using the shared key
$decryptedMessage = sodium_crypto_secretbox_open($encryptedMessage, $nonce, $sharedKeyServer['rx']);

if ($decryptedMessage === false) {
    echo "Failed to decrypt the message.\n";
} else {
    echo "Server successfully decrypted message: " . $decryptedMessage . "\n";
}

// Example 5: Storing and retrieving keys securely

// Save the client's secret key to a secure location
$clientSecretKeyPath = '/tmp/test/client_secret_key';
file_put_contents($clientSecretKeyPath, $clientSecretKey);

// Retrieve the secret key when needed
$retrievedSecretKey = file_get_contents($clientSecretKeyPath);

if ($retrievedSecretKey === false) {
    echo "Failed to retrieve the secret key from storage.\n";
} else {
    echo "Client's secret key successfully retrieved from storage.\n";
}

?>