<?php

// Function to list available cipher methods in PHP
function listCipherMethods() {
    // Get all cipher methods
    $cipherMethods = openssl_get_cipher_methods();

    // Display the methods
    foreach ($cipherMethods as $method) {
        echo "Available Cipher Method: " . $method . PHP_EOL;
    }
}

// Function to check if a specific cipher method is available
function isCipherMethodAvailable($method) {
    $cipherMethods = openssl_get_cipher_methods();
    return in_array($method, $cipherMethods);
}

// Example usage
listCipherMethods();

// Check for a specific cipher
$specificCipher = 'aes-256-cbc';
if (isCipherMethodAvailable($specificCipher)) {
    echo "$specificCipher is available for use." . PHP_EOL;
} else {
    echo "$specificCipher is NOT available." . PHP_EOL;
}

// In a real application, handle errors and validate ciphers properly
?>