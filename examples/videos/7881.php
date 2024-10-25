<?php
require 'vendor/autoload.php'; // Assuming you are using Composer for JWT

use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class Auth {
    private $secretKey = 'your-secret-key';
    private $issuer = 'http://your-domain.com';
    private $audience = 'http://your-audience.com';
    
    // Function to create JWT
    public function createToken($userId) {
        $payload = [
            'iss' => $this->issuer,
            'aud' => $this->audience,
            'iat' => time(), // Issued at
            'exp' => time() + 3600, // Expiration time (1 hour)
            'userId' => $userId
        ];

        return JWT::encode($payload, $this->secretKey);
    }

    // Function to decode and validate JWT
    public function validateToken($token) {
        try {
            $decoded = JWT::decode($token, $this->secretKey, ['HS256']);
            return (array) $decoded; // Return decoded data
        } catch (ExpiredException $e) {
            echo 'Token has expired. Please log in again.' . PHP_EOL;
            return null;
        } catch (Exception $e) {
            echo 'Invalid token: ' . $e->getMessage() . PHP_EOL;
            return null;
        }
    }
}

// Example Usage
$auth = new Auth();
$userId = 12345; // Example user ID

// Create a new JWT
$token = $auth->createToken($userId);
echo "Generated Token: " . $token . PHP_EOL;

// Validate the token
$decodedData = $auth->validateToken($token);
if ($decodedData) {
    echo "User ID from token: " . $decodedData['userId'] . PHP_EOL;
}
?>