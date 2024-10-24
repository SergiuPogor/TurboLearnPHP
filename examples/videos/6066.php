<?php
// Example: Using sodium_crypto_stream_xchacha20_keygen for secure encryption

// Step 1: Generate a secure key using sodium_crypto_stream_xchacha20_keygen
$key = sodium_crypto_stream_xchacha20_keygen();

// Sample data to encrypt
$dataToEncrypt = "This is a secret message that needs encryption.";

// Step 2: Define a nonce (Number used once)
$nonce = random_bytes(SODIUM_CRYPTO_STREAM_NONCEBYTES);

// Step 3: Encrypt the data using sodium_crypto_stream_xchacha20
$encryptedData = sodium_crypto_stream_xchacha20($dataToEncrypt, $nonce, $key);

// Display encrypted data in a readable format
$base64Encrypted = base64_encode($encryptedData);
echo "Encrypted Data: " . $base64Encrypted . "\n";

// Step 4: Decrypting the data to show it works
$decryptedData = sodium_crypto_stream_xchacha20($encryptedData, $nonce, $key);

// Display the decrypted data
echo "Decrypted Data: " . $decryptedData . "\n";

// Step 5: Function to handle file encryption and decryption
function encryptFile($filePath, $key) {
    $nonce = random_bytes(SODIUM_CRYPTO_STREAM_NONCEBYTES);
    $data = file_get_contents($filePath);
    $encryptedData = sodium_crypto_stream_xchacha20($data, $nonce, $key);
    
    // Save encrypted data with nonce
    file_put_contents($filePath . '.enc', $nonce . $encryptedData);
}

function decryptFile($filePath, $key) {
    $data = file_get_contents($filePath);
    $nonce = mb_substr($data, 0, SODIUM_CRYPTO_STREAM_NONCEBYTES, '8bit');
    $encryptedData = mb_substr($data, SODIUM_CRYPTO_STREAM_NONCEBYTES, null, '8bit');
    
    return sodium_crypto_stream_xchacha20($encryptedData, $nonce, $key);
}

// Example usage of file encryption and decryption
$sampleFilePath = '/tmp/test/sample.txt'; // Ensure this file exists
encryptFile($sampleFilePath, $key);
echo "File encrypted successfully.\n";

// Decrypt the file and display contents
$decryptedFileData = decryptFile($sampleFilePath . '.enc', $key);
echo "Decrypted File Data: " . $decryptedFileData . "\n";
?>