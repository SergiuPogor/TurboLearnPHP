<?php
// Function to create a secure random password
function createSecurePassword(int $length = 12): string {
    // Validate length
    if ($length < 8) {
        throw new InvalidArgumentException("Password length must be at least 8.");
    }

    // Generate random bytes
    $bytes = random_bytes($length);

    // Encode bytes to base64 and trim to the desired length
    return substr(base64_encode($bytes), 0, $length);
}

// Usage example
try {
    $password = createSecurePassword(16); // Generate a 16-character secure password
    echo "Secure Password: " . $password;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>