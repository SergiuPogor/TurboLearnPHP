<?php

// Example: Implementing Monolog for Error Logging
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a log channel
$log = new Logger('application');
$log->pushHandler(new StreamHandler('logs/app.log', Logger::DEBUG));

// Example error handling
try {
    throw new Exception('An example error occurred!');
} catch (Exception $e) {
    // Log error message
    $log->error('Caught exception: ' . $e->getMessage());
}