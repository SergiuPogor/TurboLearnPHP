<?php

// Example: Using openssl_cipher_iv_length() to dynamically handle encryption IV length

// Step 1: Define the encryption method (cipher)
$cipher_method = 'aes-256-cbc'; // AES with 256-bit key and CBC mode

// Step 2: Get the correct IV length for the chosen cipher
$iv_length = openssl_cipher_iv_length($cipher_method);
echo "IV length for $cipher_method: $iv_length\n";

// Step 3: Generate a random IV based on the required length
$iv = openssl_random_pseudo_bytes($iv_length);

// Step 4: Encrypt some data using the cipher method and IV
$data = 'Sensitive data that needs encryption';
$encryption_key = 'my_secret_encryption_key'; // Should be 32 bytes for AES-256

$encrypted_data = openssl_encrypt(
    $data,
    $cipher_method,
    $encryption_key,
    OPENSSL_RAW_DATA,
    $iv
);

echo "Encrypted data (base64): " . base64_encode($encrypted_data) . "\n";

// Step 5: Decrypt the data using the same IV and cipher method
$decrypted_data = openssl_decrypt(
    $encrypted_data,
    $cipher_method,
    $encryption_key,
    OPENSSL_RAW_DATA,
    $iv
);

echo "Decrypted data: $decrypted_data\n";

// Step 6: Handle multiple ciphers with varying IV lengths
$cipher_methods = ['aes-256-cbc', 'bf-cbc', 'des-ede3-cbc'];
foreach ($cipher_methods as $method) {
    $iv_len = openssl_cipher_iv_length($method);
    echo "IV length for $method: $iv_len\n";
    $iv = openssl_random_pseudo_bytes($iv_len);
    
    $encrypted = openssl_encrypt(
        $data,
        $method,
        $encryption_key,
        OPENSSL_RAW_DATA,
        $iv
    );
    
    $decrypted = openssl_decrypt(
        $encrypted,
        $method,
        $encryption_key,
        OPENSSL_RAW_DATA,
        $iv
    );
    
    echo "Decrypted data for $method: $decrypted\n";
}

// Step 7: Save the IV along with encrypted data for decryption later
$encrypted_data_with_iv = base64_encode($iv . $encrypted_data);
$iv_extracted = substr(base64_decode($encrypted_data_with_iv), 0, $iv_length);
$encrypted_extracted = substr(base64_decode($encrypted_data_with_iv), $iv_length);

// Step 8: Decrypt the data using the extracted IV
$decrypted_extracted = openssl_decrypt(
    $encrypted_extracted,
    $cipher_method,
    $encryption_key,
    OPENSSL_RAW_DATA,
    $iv_extracted
);

echo "Decrypted data from extracted IV: $decrypted_extracted\n";

// Step 9: Store the encrypted data securely in a file
$storage_file = '/tmp/test/encrypted_data.txt';
file_put_contents($storage_file, $encrypted_data_with_iv);

// Step 10: Advanced tip - Use a secure random key for each encryption session
$secure_key = openssl_random_pseudo_bytes(32); // Secure key generation for AES-256

$secure_encrypted = openssl_encrypt(
    $data,
    $cipher_method,
    $secure_key,
    OPENSSL_RAW_DATA,
    $iv
);

echo "Securely encrypted data: " . base64_encode($secure_encrypted) . "\n";

// Always remember to close resources or files when done