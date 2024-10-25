<?php
// Using Composer for Autoloading in PHP

// Step 1: Install Composer (run this in terminal)
// composer init

// Step 2: Create your project structure
// Example structure:
// /my-project
// ├── composer.json
// ├── src
// │   ├── User.php
// │   └── Product.php
// └── index.php

// Step 3: Define autoloading in composer.json
// Example of composer.json
// {
//     "autoload": {
//         "psr-4": {
//             "App\\": "src/"
//         }
//     }
// }

// Step 4: Create classes in src folder

namespace App;

class User {
    public function getName() {
        return "John Doe";
    }
}

class Product {
    public function getPrice() {
        return 99.99;
    }
}

// Step 5: Include Composer's autoload file in index.php
require 'vendor/autoload.php';

use App\User;
use App\Product;

// Using the classes
$user = new User();
echo $user->getName(); // Output: John Doe

$product = new Product();
echo $product->getPrice(); // Output: 99.99

// Step 6: Update Composer autoload files (run this in terminal)
// composer dump-autoload
?>