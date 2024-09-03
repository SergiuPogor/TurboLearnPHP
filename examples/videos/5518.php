<?php

// Function to generate a random salt
function generateSalt($length = 16) {
    return bin2hex(random_bytes($length));
}

// Function to create a hash using a password and a salt
function createHash($password, $salt) {
    return hash('sha256', $password . $salt);
}

// Function to securely compare two hashes
function compareHashesSecurely($hash1, $hash2) {
    if (hash_equals($hash1, $hash2)) {
        echo "Secure: Hashes match!" . PHP_EOL;
    } else {
        echo "Secure: Hashes do not match." . PHP_EOL;
    }
}

// Function to simulate user registration
function registerUser($username, $password) {
    $salt = generateSalt();
    $hash = createHash($password, $salt);
    echo "User $username registered with salt: $salt and hash: $hash" . PHP_EOL;
    return ['salt' => $salt, 'hash' => $hash];
}

// Function to simulate user login
function loginUser($username, $inputPassword, $storedSalt, $storedHash) {
    $inputHash = createHash($inputPassword, $storedSalt);
    echo "User $username attempting login..." . PHP_EOL;
    compareHashesSecurely($storedHash, $inputHash);
}

// Function to simulate a token-based action (e.g., password reset)
function validateToken($providedToken, $validToken) {
    echo "Validating provided token..." . PHP_EOL;
    compareHashesSecurely($providedToken, $validToken);
}

// Function to demonstrate potential timing attack vulnerability
function compareHashesInsecurely($hash1, $hash2) {
    if ($hash1 === $hash2) {
        echo "Insecure: Hashes match!" . PHP_EOL;
    } else {
        echo "Insecure: Hashes do not match." . PHP_EOL;
    }
}

// Example Scenario: User Registration and Login
$registration = registerUser('john_doe', 'secure_password123');
$storedSalt = $registration['salt'];
$storedHash = $registration['hash'];

// Simulate a successful login
loginUser('john_doe', 'secure_password123', $storedSalt, $storedHash);

// Simulate a failed login
loginUser('john_doe', 'wrong_password', $storedSalt, $storedHash);

// Example Scenario: Token Validation
$validToken = hash('sha256', 'secret_token_value');
$providedToken = hash('sha256', 'secret_token_value'); // Correct token
validateToken($providedToken, $validToken);

$providedToken = hash('sha256', 'incorrect_token_value'); // Incorrect token
validateToken($providedToken, $validToken);

// Example Scenario: Timing Attack Vulnerability Demonstration
$partialHash1 = hash('sha256', 'almost_right_password');
$partialHash2 = hash('sha256', 'almost_right_password2');
echo "Comparing hashes insecurely (vulnerable to timing attack):" . PHP_EOL;
compareHashesInsecurely($partialHash1, $partialHash2);

// Example Scenario: Different lengths comparison
echo "Comparing hashes of different lengths securely:" . PHP_EOL;
$shortHash = substr($validToken, 0, 20);
compareHashesSecurely($shortHash, $validToken);

echo "Comparing hashes of different lengths insecurely:" . PHP_EOL;
compareHashesInsecurely($shortHash, $validToken);

?>

