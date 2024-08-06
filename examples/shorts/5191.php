<?php
// Example of using random_int() for secure random integer generation

try {
    // Generate a cryptographically secure random integer between 1 and 100
    $secureRandomInt = random_int(1, 100);

    // Output the secure random integer
    echo "Secure Random Integer: " . $secureRandomInt . "\n";

    // Example usage in a function
    function generateRandomToken(int $length): string
    {
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            // Generate a random integer and convert to a character
            $token .= chr(random_int(33, 126)); // Printable ASCII characters
        }
        return $token;
    }

    // Generate and display a secure token
    echo "Secure Token: " . generateRandomToken(16) . "\n";

    // Handling file operations with random_int()
    $file = '/tmp/test.txt';
    if (!file_exists($file)) {
        file_put_contents($file, "Secure token: " . generateRandomToken(16));
        echo "File created and token written.\n";
    } else {
        echo "File already exists.\n";
    }
} catch (Exception $e) {
    // Handle exception if random_int() fails
    echo "Error generating random integer: " . $e->getMessage() . "\n";
}
?>