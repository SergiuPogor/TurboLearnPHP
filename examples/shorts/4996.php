<?php
// Function to generate a secure random token
function generateSecureToken(int $length = 32): string {
    // Ensure the length is a positive integer
    if ($length <= 0) {
        throw new InvalidArgumentException("Length must be a positive integer.");
    }

    // Create a random byte string
    $bytes = random_bytes($length);

    // Convert bytes to hexadecimal string
    return bin2hex($bytes);
}

// Usage example
try {
    $token = generateSecureToken(16); // Generate a 16-byte secure token
    echo "Secure Token: " . $token;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>