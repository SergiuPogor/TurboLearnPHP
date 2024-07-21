// Example simulating bubbling effects in PHP
function simulateBubbling() {
    $intensity = rand(1, 5); // Random intensity level
    for ($i = 0; $i < $intensity; $i++) {
        $size = rand(10, 50); // Random bubble size
        $delay = rand(100, 1000); // Random delay between bubbles
        echo "<div class='bubble' style='width: {$size}px; height: {$size}px;'></div>";
        usleep($delay * 1000); // Convert milliseconds to microseconds for usleep
    }
}

// Usage
simulateBubbling();