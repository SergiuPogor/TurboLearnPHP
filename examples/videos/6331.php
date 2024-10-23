<?php

// This PHP script demonstrates how to use sodium_crypto_box_seal_open() 
// for securely decrypting a sealed message.

// Load the public and secret keys (typically, these would be securely generated and stored)
$publicKey = sodium_crypto_box_keypair(); // This should be the recipient's public key
$secretKey = sodium_crypto_box_secretkey($publicKey); // The recipient's secret key

// Simulating a message that has been sealed
$message = "This is a confidential message.";
$sealedMessage = sodium_crypto_box_seal($message, $publicKey);

// Now, let's decrypt the sealed message using sodium_crypto_box_seal_open()
try {
    // Attempt to open the sealed message
    $decryptedMessage = sodium_crypto_box_seal_open($sealedMessage, $secretKey);
    echo "Decrypted Message: " . $decryptedMessage . "\n";
} catch (SodiumException $e) {
    // Handle the case where decryption fails
    echo "Decryption failed: " . $e->getMessage() . "\n";
}

// Example of sending multiple messages securely
$messages = [
    "First secret message.",
    "Second secret message.",
    "Third secret message."
];

foreach ($messages as $msg) {
    $sealedMsg = sodium_crypto_box_seal($msg, $publicKey);
    echo "Sealed Message: " . base64_encode($sealedMsg) . "\n"; // Display sealed messages encoded
}

// A function to handle receiving and decrypting sealed messages
function receiveAndDecrypt($sealedMessage, $secretKey) {
    try {
        return sodium_crypto_box_seal_open($sealedMessage, $secretKey);
    } catch (SodiumException $e) {
        return "Decryption failed: " . $e->getMessage();
    }
}

// Simulate receiving a sealed message
$receivedSealedMessage = sodium_crypto_box_seal("Simulated sealed message.", $publicKey);
$decryptedReceivedMessage = receiveAndDecrypt($receivedSealedMessage, $secretKey);
echo "Decrypted Received Message: " . $decryptedReceivedMessage . "\n";

?>