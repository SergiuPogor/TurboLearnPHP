<?php

// Example of solving the 'Class Not Found' error in Yii Framework

// Step 1: Verify the namespace and class path
// File: controllers/SiteController.php
namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}

// Step 2: Ensure your autoload configuration in composer.json
// File: composer.json
{
    "autoload": {
        "psr-4": {
            "app\\": "src/"
        }
    }
}

// Run 'composer dump-autoload' to refresh the autoload configuration
// Command line
// $ composer dump-autoload

// Step 3: Check if the view file exists
// Make sure you have 'index.php' in your views directory for the site controller
// File: views/site/index.php

?>
<h1>Welcome to the Index Page!</h1>
<p>If you see this page, your class autoloading is working perfectly.</p>

// Pro tip: Don't let autoloading errors drive you mad, it's just paths and namespaces... or is it? 😜