<?php
// A practical example of using shm_get_var() in a real-world application
// to store and retrieve session data across multiple processes using shared memory.

$key = ftok('/tmp/test/input.txt', 'a'); // Generate a key from a file for shared memory
$shm_id = shm_attach($key, 1024, 0666); // Attach a 1KB shared memory block

if (!$shm_id) {
    die("Failed to create shared memory.");
}

// Storing data in shared memory
$session_data = [
    'user_id' => 123,
    'username' => 'johndoe',
    'cart_items' => ['item1', 'item2', 'item3']
];

shm_put_var($shm_id, 1, $session_data); // Store the session data with a key '1'

// Fetching data using shm_get_var()
if (shm_has_var($shm_id, 1)) {
    $stored_data = shm_get_var($shm_id, 1);
    echo "User ID: " . $stored_data['user_id'] . "\n";
    echo "Username: " . $stored_data['username'] . "\n";
    echo "Cart Items: " . implode(", ", $stored_data['cart_items']) . "\n";
} else {
    echo "No data found in shared memory.\n";
}

// Advanced Use Case: Sharing Cache Data Between Processes
// Imagine multiple processes sharing a cache of expensive-to-compute data

function cache_expensive_data($shm_id, $key, $compute_function) {
    if (!shm_has_var($shm_id, $key)) {
        // Compute expensive data only once and store in shared memory
        $computed_data = $compute_function();
        shm_put_var($shm_id, $key, $computed_data);
    }
    
    // Fetch and return from shared memory to avoid recomputation
    return shm_get_var($shm_id, $key);
}

$expensive_data_key = 2;

// Function to simulate expensive data computation
$compute_function = function () {
    sleep(2); // Simulate time-consuming computation
    return ['expensive_value' => rand(1000, 9999)];
};

// Store or retrieve expensive data from shared memory
$expensive_data = cache_expensive_data($shm_id, $expensive_data_key, $compute_function);
echo "Expensive data: " . $expensive_data['expensive_value'] . "\n";

// Clean up shared memory after use
shm_remove($shm_id);
shm_detach($shm_id);

// Multiple Ways: Using Shared Memory for Session Management
// Instead of relying on standard session handling (which writes to disk),
// shared memory can be a faster option for large-scale applications handling millions of sessions.

$session_shm_key = ftok('/tmp/test/input.zip', 's');
$session_shm_id = shm_attach($session_shm_key, 4096, 0666);

if (shm_has_var($session_shm_id, 1)) {
    $session_info = shm_get_var($session_shm_id, 1);
    echo "Retrieved session info from shared memory.\n";
} else {
    // Store session info if not found
    $new_session_info = ['token' => 'abc123', 'expires' => time() + 3600];
    shm_put_var($session_shm_id, 1, $new_session_info);
    echo "Stored new session info in shared memory.\n";
}

shm_remove($session_shm_id);
shm_detach($session_shm_id);
?>