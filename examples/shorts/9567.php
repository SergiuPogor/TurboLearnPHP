<?php
// Secure way to assign array values to variables
function secureExtract(array $data) {
    // Validate and sanitize the data first
    foreach ($data as $key => $value) {
        if (!is_string($key) || preg_match('/[^a-zA-Z_]/', $key)) {
            throw new InvalidArgumentException("Invalid variable name: $key");
        }
        // Sanitize the value
        $data[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
    
    // Safely assign variables
    foreach ($data as $key => $value) {
        // Avoid overwriting existing variables
        if (!isset($GLOBALS[$key])) {
            $GLOBALS[$key] = $value;
        }
    }
}

// Example usage
$userData = [
    'username' => '<script>alert("xss")</script>',
    'email' => 'user@example.com'
];

try {
    secureExtract($userData);
    echo "Username: " . $username . "\n"; // Outputs sanitized username
    echo "Email: " . $email . "\n"; // Outputs email
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}