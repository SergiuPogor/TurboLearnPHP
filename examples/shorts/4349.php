// Example PHP code to control an adjustable electric drill milling machine

// Function to send commands to the drill milling machine
function sendDrillCommand($command) {
    $drillApiUrl = 'http://drill-machine.local/api/command';
    
    // Initialize cURL session
    $ch = curl_init($drillApiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['command' => $command]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);
    curl_close($ch);

    // Return the response
    return json_decode($response, true);
}

// Function to fetch sensor data from the drill milling machine
function getSensorData() {
    $sensorApiUrl = 'http://drill-machine.local/api/sensors';

    // Fetch the sensor data
    $response = file_get_contents($sensorApiUrl);
    if ($response === FALSE) {
        die("Error fetching sensor data.");
    }

    // Decode the JSON response
    return json_decode($response, true);
}

// Function to adjust drill speed based on sensor data
function adjustDrillSpeed($sensorData) {
    $currentLoad = $sensorData['current_load'];
    $currentSpeed = $sensorData['current_speed'];

    // Example logic to adjust speed
    if ($currentLoad > 80) {
        $newSpeed = max(0, $currentSpeed - 10); // Decrease speed
    } elseif ($currentLoad < 50) {
        $newSpeed = min(100, $currentSpeed + 10); // Increase speed
    } else {
        $newSpeed = $currentSpeed; // Maintain speed
    }

    // Send command to adjust speed
    sendDrillCommand(['speed' => $newSpeed]);
}

// Example usage
$sensorData = getSensorData();
adjustDrillSpeed($sensorData);