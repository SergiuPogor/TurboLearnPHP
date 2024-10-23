<?php

// Function to encrypt data using a public key
function encryptData($publicKey, $data) {
    openssl_public_encrypt($data, $encrypted, $publicKey);
    return base64_encode($encrypted); // Encode encrypted data for safe transport
}

// Function to decrypt data using a public key
function decryptData($privateKey, $encryptedData) {
    $encryptedData = base64_decode($encryptedData);
    openssl_private_decrypt($encryptedData, $decrypted, $privateKey);
    return $decrypted;
}

// Example usage
$privateKey = file_get_contents('/tmp/test/private_key.pem');
$publicKey = file_get_contents('/tmp/test/public_key.pem');

$dataToEncrypt = "This is a secret message.";
$encryptedData = encryptData($publicKey, $dataToEncrypt);

echo "Encrypted Data: " . $encryptedData . PHP_EOL;

// Now let's decrypt the data
$decryptedData = decryptData($privateKey, $encryptedData);
echo "Decrypted Data: " . $decryptedData . PHP_EOL;

// In this example, make sure to handle errors in real applications
?>