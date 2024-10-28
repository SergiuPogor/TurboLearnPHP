<?php

// Example 1: Using Xdebug for step-by-step debugging
// Ensure Xdebug is installed and configured in your PHP environment
// Xdebug will allow you to set breakpoints and inspect variables at runtime
function calculateTotal($prices)
{
    $total = 0;
    foreach ($prices as $price) {
        $total += $price;
    }
    return $total;
}

$prices = [100, 200, 300];
// Set a breakpoint here to inspect $total
$total = calculateTotal($prices);

// Example 2: Using Laravel Debugbar for debugging in Laravel
// Ensure you have installed and configured Laravel Debugbar via Composer
// Add 'Barryvdh\Debugbar\ServiceProvider' to config/app.php

Route::get('/debug', function () {
    \Debugbar::startMeasure('render','Time for rendering');
    $users = \App\Models\User::all();
    \Debugbar::addMessage('Retrieved all users', 'info');
    \Debugbar::stopMeasure('render');
    return view('welcome');
});

// Example 3: Using error_reporting() and var_dump() for quick debugging
// These basic tools are still effective for debugging small issues

error_reporting(E_ALL); // Report all errors

function divide($a, $b) {
    if ($b === 0) {
        var_dump('Division by zero detected!');
        return false;
    }
    return $a / $b;
}

$result = divide(10, 0);

// Example 4: Using Monolog for advanced logging
// Monolog is a PSR-3 compatible logging library
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('my_app');
$log->pushHandler(new StreamHandler('/tmp/test/app.log', Logger::DEBUG));

$log->info('This is an informational message');
$log->error('This is an error message');
?>