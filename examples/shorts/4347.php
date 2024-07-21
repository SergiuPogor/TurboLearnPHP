// Example PHP code to implement data clamping

// Function to clamp a value within a specified range
function clamp($value, $min, $max) {
    return max($min, min($max, $value));
}

// Example usage
// Assume we have a temperature sensor that should only read between 0 and 100 degrees
$temperature = 150; // A reading that is too high
$clampedTemperature = clamp($temperature, 0, 100);

echo "Original temperature: $temperature\n";
echo "Clamped temperature: $clampedTemperature\n";

// Function to demonstrate clamping in a real application
function logTemperature($temperature) {
    // Define the acceptable range for temperature readings
    $minTemp = -10;
    $maxTemp = 50;

    // Clamp the temperature value
    $clampedTemp = clamp($temperature, $minTemp, $maxTemp);

    // Log the clamped temperature value
    file_put_contents('temperature_log.txt', "Temperature: $clampedTemp\n", FILE_APPEND);

    echo "Logged clamped temperature: $clampedTemp\n";
}

// Example usage in a real scenario
$actualTemperature = -20; // A reading that is too low
logTemperature($actualTemperature);