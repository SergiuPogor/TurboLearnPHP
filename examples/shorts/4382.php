// Example PHP code for handling asynchronous tasks using ReactPHP

use React\EventLoop\Factory;
use React\Promise\Promise;

// Create event loop instance
$loop = Factory::create();

// Asynchronous task example
$loop->futureTick(function () {
    echo "Executing async task...\n";
});

// Another async task
$promise = new Promise(function ($resolve, $reject) use ($loop) {
    $loop->addTimer(2, function () use ($resolve) {
        $resolve("Async task completed.");
    });
});

// Handle promise resolution
$promise->then(function ($result) {
    echo $result . "\n";
});

// Run the event loop
$loop->run();