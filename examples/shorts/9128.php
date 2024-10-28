<?php

// File: /tmp/test/src/Controllers/UserController.php

namespace App\Controllers;

class UserController
{
    public function index()
    {
        echo "User controller index!";
    }
}

// File: /tmp/test/src/Routes/web.php

use App\Controllers\UserController;

require_once '/path/to/vendor/autoload.php'; // Composer autoload file

$controller = new UserController();
$controller->index();

// PSR-4 Composer Autoload Configuration in composer.json
// "autoload": {
//     "psr-4": {
//         "App\\": "src/"
//     }
// }

// Steps to solve the 'Class Not Found' error:
// 1. Ensure that the namespace `App\Controllers` matches the folder structure.
// 2. The folder `src/Controllers/` should contain the `UserController.php` file.
// 3. Run `composer dump-autoload` to refresh the autoload mappings.
?>