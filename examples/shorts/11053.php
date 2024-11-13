<?php

// Managing Dependencies in Large Projects: require_once vs autoload

// 1. Using require_once (Not optimal for large projects)
require_once '/tmp/test/PaymentProcessor.php';
require_once '/tmp/test/UserManager.php';
require_once '/tmp/test/NotificationService.php';

use App\Services\PaymentProcessor;
use App\Services\UserManager;
use App\Services\NotificationService;

$payment = new PaymentProcessor();
$userManager = new UserManager();
$notification = new NotificationService();

$payment->processPayment(250.75);
$userManager->createUser("john.doe@example.com");
$notification->sendEmail("john.doe@example.com", "Welcome!");

// The above approach loads all files even if only one service is needed.

// 2. Using Autoload (Efficient for large projects)
// Autoload function for classes
spl_autoload_register(function (string $class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require $path;
    }
});

// Autoload only loads classes when actually needed
$paymentService = new \App\Services\PaymentProcessor();
$paymentService->processPayment(399.99);

$userManagerService = new \App\Services\UserManager();
$userManagerService->createUser("jane.doe@example.com");

$notificationService = new \App\Services\NotificationService();
$notificationService->sendEmail("jane.doe@example.com", "Welcome to our platform!");

// Additional flexibility: loading dynamic classes
$serviceType = 'UserManager';
$serviceClass = "\\App\\Services\\$serviceType";

if (class_exists($serviceClass)) {
    $service = new $serviceClass();
    $service->createUser("random.user@example.com");
}

// Utilize autoload for reading input file dynamically
$inputPath = '/tmp/test/input.txt';
if (file_exists($inputPath)) {
    $lines = file($inputPath, FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $className = trim($line);
        if (class_exists($className)) {
            $obj = new $className();
            if (method_exists($obj, 'execute')) {
                $obj->execute();
            }
        }
    }
}
?>