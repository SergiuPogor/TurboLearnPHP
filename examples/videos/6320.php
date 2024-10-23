<?php

// Example: Securely hashing a password with openssl_pbkdf2()

// User's plain text password
$password = 'userPassword123';

// Generate a random salt for better security
$salt = openssl_random_pseudo_bytes(16);

// Define the number of iterations
$iterations = 10000;

// Hash the password using PBKDF2
$hashedPassword = openssl_pbkdf2(
    $password,        // The password to hash
    $salt,           // The salt
    32,              // Length of the derived key
    $iterations,     // Number of iterations
    'sha256'         // Hashing algorithm
);

// Store the salt and hashed password in a database
$dbEntry = [
    'salt' => base64_encode($salt),  // Store salt as base64
    'hash' => base64_encode($hashedPassword) // Store hash as base64
];

// Function to verify the password later
function verifyPassword($inputPassword, $storedHash, $storedSalt, $iterations) {
    $salt = base64_decode($storedSalt);
    $hash = openssl_pbkdf2(
        $inputPassword, 
        $salt, 
        32, 
        $iterations, 
        'sha256'
    );

    return hash_equals($storedHash, base64_encode($hash)); // Safe comparison
}

// Example usage: Verify password
$isValid = verifyPassword('userPassword123', $dbEntry['hash'], $dbEntry['salt'], $iterations);
echo $isValid ? 'Password is valid!' : 'Invalid password.';

?>