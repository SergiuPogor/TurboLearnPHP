<?php
// Example of managing dependencies using Composer in a PHP project

// Step 1: Initialize Composer in the project
// Command (run in terminal): composer init
// This creates a composer.json file in the project root to manage dependencies.

// Step 2: Add dependencies using Composer
// Command: composer require guzzlehttp/guzzle
// This installs Guzzle, an HTTP client library, and updates composer.json accordingly.

require __DIR__ . '/vendor/autoload.php'; // Autoload classes from installed packages

use GuzzleHttp\Client;

// Step 3: Use the dependency (Guzzle) in your code
$client = new Client();
$response = $client->get('https://api.example.com/data', [
    'headers' => [
        'Authorization' => 'Bearer YOUR_TOKEN',
        'Accept' => 'application/json',
    ],
]);
$data = json_decode($response->getBody(), true);

// Alternative: Install multiple dependencies and manage versions
// Command: composer require monolog/monolog symfony/console
// Composer handles version compatibility between these packages automatically.

// Logging example using Monolog
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('my_app');
$log->pushHandler(new StreamHandler('/tmp/test/app.log', Logger::WARNING));
$log->warning('Dependency management example running smoothly.');

// Step 4: Update dependencies with one command
// Command: composer update
// Composer updates all packages to their latest compatible versions listed in composer.json

// Clean up or install dependencies on a fresh environment
// Command: composer install
// Composer installs exact versions of dependencies as listed in composer.lock for consistency across environments
?>