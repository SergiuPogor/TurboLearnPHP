<?php

function checkPasswordHash(string $password, string $hashedPassword): bool {
    // Check if the hash needs to be rehashed
    if (sodium_crypto_pwhash_str_needs_rehash($hashedPassword, 
        SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, 
        SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE)) {
        // Rehash the password
        $newHash = sodium_crypto_pwhash_str($password, 
            SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, 
            SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);
        
        // Store the new hash
        // For example, you might save it to your database here
        echo "Password hash updated to: $newHash\n";
        return true; // Indicating that rehash was performed
    }
    
    echo "Password hash is up to date.\n";
    return false; // Indicating no action was needed
}

// Example usage
$storedHash = sodium_crypto_pwhash_str("userPassword123", 
    SODIUM_CRYPTO_PWHASH_OPSLIMIT_INTERACTIVE, 
    SODIUM_CRYPTO_PWHASH_MEMLIMIT_INTERACTIVE);

// Simulating a scenario where we need to check and possibly rehash the password
$passwordToCheck = "userPassword123";

try {
    $result = checkPasswordHash($passwordToCheck, $storedHash);
    if ($result) {
        echo "Hash was updated successfully.\n";
    } else {
        echo "No need to update the hash.\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Bonus: Check multiple passwords
$passwordsToCheck = [
    "userPassword123",
    "anotherSecurePassword456"
];

foreach ($passwordsToCheck as $password) {
    try {
        checkPasswordHash($password, $storedHash);
    } catch (Exception $e) {
        echo "Error checking password $password: " . $e->getMessage() . "\n";
    }
}
?>