<?php

// Function to generate a secure key pair for signing
function generateKeyPair($seed) {
    // Generate the public and private key pair from the seed
    $keyPair = sodium_crypto_sign_seed_keypair($seed);
    
    // Extract the private and public keys
    $privateKey = sodium_crypto_sign_secretkey($keyPair);
    $publicKey = sodium_crypto_sign_publickey($keyPair);
    
    return [$privateKey, $publicKey];
}

// Function to demonstrate signing and verifying a message
function demoSigning() {
    // Generate a random seed for key pair generation
    $seed = random_bytes(SODIUM_CRYPTO_SIGN_SEEDBYTES);
    
    // Generate the key pair
    list($privateKey, $publicKey) = generateKeyPair($seed);
    
    // The message to sign
    $message = "This is a secret message!";
    
    // Sign the message with the private key
    $signature = sodium_crypto_sign($message, $privateKey);
    
    // Verify the signature with the public key
    $verifiedMessage = sodium_crypto_sign_open($signature, $publicKey);
    
    // Check if verification was successful
    if ($verifiedMessage === false) {
        echo "Signature verification failed!" . PHP_EOL;
    } else {
        echo "Message verified successfully: " . $verifiedMessage . PHP_EOL;
    }
}

// Run the demonstration
demoSigning();