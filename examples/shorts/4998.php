<?php
// Function to generate a random password
function generateRandomPassword(int $length = 12): string {
    // Validate length
    if ($length < 8) {
        throw new InvalidArgumentException("Password length must be at least 8.");
    }

    // Characters to use in password
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    
    // Shuffle characters and create a random password
    $shuffled = str_shuffle($characters);
    
    // Return a substring of the desired length
    return substr($shuffled, 0, $length);
}

// Usage example
try {
    $password = generateRandomPassword(16); // Generate a 16-character random password
    echo "Random Password: " . $password;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>