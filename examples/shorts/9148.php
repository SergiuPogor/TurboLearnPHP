<?php

// Example of storing API keys securely using environment variables
// Make sure to set the environment variable in your server configuration

$apiKey = getenv('API_KEY'); // Get the API key from environment variable

if ($apiKey === false) {
    die("API Key is not set. Please check your configuration.");
}

// Example using a configuration file located outside the web root
$configFile = '/path/to/your/config.php';

if (file_exists($configFile)) {
    include $configFile;
} else {
    die("Configuration file not found.");
}

// Now you can access your API key securely
$apiKey = $config['API_KEY']; // Assuming your config file returns an array with keys

// Example of using a secure vault service for managing secrets
// Assuming you're using a vault client like HashiCorp Vault

require '/tmp/test/vendor/autoload.php'; // Composer autoloading

use Vault\Client;

// Initialize the Vault client
$client = new Client(['address' => 'https://vault.example.com']);

$client->loginWithToken('your-vault-token'); // Secure login to the vault

// Retrieve the API key from the vault
$secret = $client->get('secret/data/api-keys');

if ($secret) {
    $apiKey = $secret['data']['data']['API_KEY'];
} else {
    die("Could not retrieve API Key from Vault.");
}

// Now $apiKey is securely retrieved from a vault or environment variable
// You can use it in your application logic here