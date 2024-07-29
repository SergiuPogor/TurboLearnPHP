<?php
/**
 * Generate a cryptographically secure random byte string.
 *
 * @param int $length Length of the byte string to generate.
 * @return string Cryptographically secure random byte string.
 * @throws Exception If the function fails to generate secure bytes.
 */
function generateSecureBytes(int $length): string {
    // Ensure length is positive
    if ($length <= 0) {
        throw new InvalidArgumentException('Length must be a positive integer.');
    }

    // Generate secure random bytes
    try {
        return random_bytes($length);
    } catch (Exception $e) {
        throw new RuntimeException('Failed to generate secure bytes: ' . $e->getMessage());
    }
}

// Example usage
try {
    $secureBytes = generateSecureBytes(16);
    echo "Secure Random Bytes: " . bin2hex($secureBytes);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>