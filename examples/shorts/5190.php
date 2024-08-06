<?php
// Example of using random_bytes() for secure random data generation

try {
    // Generate 16 cryptographically secure random bytes
    $randomBytes = random_bytes(16);

    // Convert bytes to a hex string for display
    $hexString = bin2hex($randomBytes);

    // Output the random bytes as a hex string
    echo "Secure Random Bytes: " . $hexString . "\n";

    // Example usage in a function
    function generateSecureToken(int $length): string
    {
        // Generate random bytes and convert to a base64 string
        return base64_encode(random_bytes($length));
    }

    // Generate and display a secure token
    echo "Secure Token: " . generateSecureToken(32) . "\n";

    // Handling file operations with random_bytes()
    $file = '/tmp/test.txt';
    if (!file_exists($file)) {
        file_put_contents($file, "Secure token: " . generateSecureToken(32));
        echo "File created and token written.\n";
    } else {
        echo "File already exists.\n";
    }
} catch (Exception $e) {
    // Handle exception if random_bytes() fails
    echo "Error generating random bytes: " . $e->getMessage() . "\n";
}
?>