<?php
// Function to calculate sunset time for a specific date and location
function getSunsetTime($latitude, $longitude, $date) {
    // Get sunset time in seconds since Unix epoch
    $sunsetTimestamp = date_sunset(strtotime($date), SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude);
    
    // Check if the sunset time is valid
    if ($sunsetTimestamp === false) {
        return "Sunset time not available for the specified date and location.";
    }
    
    // Convert timestamp to a formatted date string
    return date("Y-m-d H:i:s", $sunsetTimestamp);
}

// Example usage: Get sunset time for San Francisco on October 21, 2024
$latitude = 37.7749;  // San Francisco latitude
$longitude = -122.4194; // San Francisco longitude
$date = "2024-10-21";

$sunsetTime = getSunsetTime($latitude, $longitude, $date);
echo "Sunset time in San Francisco on $date: $sunsetTime\n";

// Example: Handling multiple locations
$locations = [
    ['name' => 'New York', 'lat' => 40.7128, 'lon' => -74.0060],
    ['name' => 'Tokyo', 'lat' => 35.6762, 'lon' => 139.6503]
];

foreach ($locations as $location) {
    $sunsetTime = getSunsetTime($location['lat'], $location['lon'], $date);
    echo "Sunset time in {$location['name']} on $date: $sunsetTime\n";
}
?>