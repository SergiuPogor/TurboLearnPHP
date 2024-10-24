<?php
// Example: Encrypting and decrypting data using sodium_crypto_stream_xchacha20_xor()

// Step 1: Generate a random key for encryption
$key = random_bytes(SODIUM_CRYPTO_STREAM_KEYBYTES);

// Step 2: Generate a unique nonce (number used once)
$nonce = random_bytes(SODIUM_CRYPTO_STREAM_NONCEBYTES);

// Sample plaintext data to encrypt
$plaintext = "This is a secret message that needs to be protected.";

// Step 3: Encrypt the data using sodium_crypto_stream_xchacha20_xor()
$encryptedData = sodium_crypto_stream_xchacha20_xor($plaintext, '', $nonce, $key);

// Display encrypted data (base64 encoded for easy handling)
$base64EncryptedData = base64_encode($encryptedData);
echo "Encrypted Data: " . $base64EncryptedData . "\n";

// Step 4: Decrypt the data using the same method
$decryptedData = sodium_crypto_stream_xchacha20_xor($encryptedData, '', $nonce, $key);

// Display the decrypted data
echo "Decrypted Data: " . $decryptedData . "\n";

// Step 5: Function to encrypt a file
function encryptFile($filePath, $key) {
    $nonce = random_bytes(SODIUM_CRYPTO_STREAM_NONCEBYTES);
    $data = file_get_contents($filePath);
    $encryptedData = sodium_crypto_stream_xchacha20_xor($data, '', $nonce, $key);

    // Save encrypted data to a new file with the nonce prepended
    file_put_contents($filePath . '.enc', $nonce . $encryptedData);
}

// Function to decrypt a file
function decryptFile($filePath, $key) {
    $data = file_get_contents($filePath);
    // Extract the nonce from the beginning of the file
    $nonce = substr($data, 0, SODIUM_CRYPTO_STREAM_NONCEBYTES);
    $encryptedData = substr($data, SODIUM_CRYPTO_STREAM_NONCEBYTES);

    // Decrypt the data
    $decryptedData = sodium_crypto_stream_xchacha20_xor($encryptedData, '', $nonce, $key);
    return $decryptedData;
}

// Example usage of file encryption and decryption
$sampleFilePath = '/tmp/test/sample.txt'; // Ensure this file exists
encryptFile($sampleFilePath, $key);
echo "File encrypted successfully.\n";

// Decrypt the file and display contents
$decryptedFileData = decryptFile($sampleFilePath . '.enc', $key);
echo "Decrypted File Data: " . $decryptedFileData . "\n";
?>