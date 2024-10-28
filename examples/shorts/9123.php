<?php

// Ensure you have Composer installed in your PHP project.
// Here's how to manage dependencies effectively with Composer.

// Step 1: Initialize Composer in your project
// Run this command in your terminal
// composer init

// Step 2: Add a package, for example, Guzzle for HTTP requests
require 'vendor/autoload.php';

use GuzzleHttp\Client;

// Create a new HTTP client instance
$client = new Client();

// Step 3: Make a GET request to an API
$response = $client->request('GET', 'https://api.example.com/data');

// Step 4: Handle the response
$body = $response->getBody();
$data = json_decode($body, true);

// Step 5: Use the data in your application
foreach ($data['items'] as $item) {
    echo "Item: " . htmlspecialchars($item['name']) . "\n";
}

// To update dependencies, run this command in your terminal
// composer update

// Note: Use 'composer require package/name' to add new packages.
// Ensure you manage your 'composer.json' carefully for version constraints.