<?php

// Example of solving the mysterious 404 error in Yii Framework

// Step 1: Check URL rules configuration
return [
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'site/index' => 'site/index', // Map 'site/index' to 'site/index'
                '<controller:\w+>/<id:\d+>' => '<controller>/view', // Generic rule for viewing a controller item
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>', // Generic rule for actions
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>', // Generic rule for all other actions
            ],
        ],
    ],
];

// Step 2: Verify the controller and action names in your URL
// Controller should be 'SiteController.php' with correct namespace
namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    // Ensure you have an actionIndex method
    public function actionIndex()
    {
        // This action renders the index view
        return $this->render('index');
    }
    
    // Example of another action
    public function actionView($id)
    {
        // Render view with ID parameter
        return $this->render('view', ['id' => $id]);
    }
}

// Step 3: Check if the view file exists
// Make sure you have 'index.php' in your views directory for the site controller
// File: views/site/index.php

?>
<h1>Welcome to the Index Page!</h1>
<p>If you see this page, your routing is working perfectly.</p>

// Bonus: Some humor to lighten your debugging process
// If all else fails, try turning it off and on again. Oh wait, this isn't hardware! 😅