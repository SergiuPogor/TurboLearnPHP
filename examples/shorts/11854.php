<?php
// Example 1: Using require_once for manual inclusion
require_once '/tmp/test/Database.php';
require_once '/tmp/test/User.php';

$db = new Database();
$user = new User($db);
echo "User ID: " . $user->getId();

// Example 2: Autoloading with PSR-4
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/tmp/test/';
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use App\Database;
use App\User;

$db = new Database();
$user = new User($db);
echo "User ID: " . $user->getId();

// Example 3: Advanced autoload with Composer (PSR-4)
require_once __DIR__ . '/vendor/autoload.php';

use App\Database;
use App\User;

$db = new Database();
$user = new User($db);
echo "User ID: " . $user->getId();

// Notes:
// 1. PSR-4 structure: namespace `App` maps to `/tmp/test/`.
// 2. Composer automates autoload setup for scalable projects.
?>