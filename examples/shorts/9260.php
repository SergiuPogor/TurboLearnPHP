<?php
// Setting up and using Xdebug for PHP debugging with Visual Studio Code

// 1. Enable Xdebug in your PHP configuration
// php.ini setup:
// zend_extension = xdebug.so
// xdebug.mode = debug
// xdebug.start_with_request = yes

// 2. Configure Xdebug for Visual Studio Code by adding the following in launch.json:
// "configurations": [
//     {
//         "name": "Listen for Xdebug",
//         "type": "php",
//         "request": "launch",
//         "port": 9003,
//         "pathMappings": {
//             "/var/www/html": "${workspaceFolder}"
//         }
//     }
// ]

// Example PHP code to debug

function processData($data) {
    $processed = [];
    
    foreach ($data as $key => $value) {
        if (is_numeric($value)) {
            $processed[$key] = $value * 2;
        } else {
            $processed[$key] = strtoupper($value);
        }
    }
    
    return $processed;
}

// Sample data array to debug
$data = [
    'item1' => 15,
    'item2' => 'hello',
    'item3' => 32,
    'item4' => 'world'
];

// Set a breakpoint here to inspect $processed
$result = processData($data);
?>