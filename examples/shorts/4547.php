<?php

// Let's solve the mysterious 404 errors in CodeIgniter due to case sensitivity issues.

// Application/Controllers/MyController.php

class MyController extends CI_Controller
{
    public function index()
    {
        echo "Hello from MyController!";
    }

    public function testMethod()
    {
        echo "This is a test method!";
    }
}

// Example URL to access the controller: http://yourdomain.com/index.php/mycontroller

// Notice the lowercase "mycontroller" in the URL. This will cause a 404 error!

// The correct URL should match the case of the controller class name exactly:
// http://yourdomain.com/index.php/MyController

// Let's add some humor with a case sensitivity check function:

function checkCaseSensitivity($url)
{
    if (preg_match('/[A-Z]/', $url)) {
        log_message('debug', 'URL contains uppercase letters: ' . $url);
    } else {
        log_message('debug', 'URL is all lowercase: ' . $url);
    }
}

// Run the check with a sample URL
checkCaseSensitivity('mycontroller');

// Make sure to always use the correct case in your URLs to avoid those pesky 404 errors!

// If you still encounter issues, double-check your routes in application/config/routes.php

$route['default_controller'] = 'MyController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Ensure the default controller and other routes match the exact case of your controller names.

// Enjoy a smoother debugging experience and fewer headaches!