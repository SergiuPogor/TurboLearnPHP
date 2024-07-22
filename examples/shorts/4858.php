<?php
// Function to calculate time with timezone offsets
function calculateTimeWithTimezone(string $date, string $timezone, int $offsetHours): string {
    try {
        // Create DateTime object with provided date and timezone
        $datetime = new DateTime($date, new DateTimeZone($timezone));

        // Create DateInterval for the offset
        $interval = new DateInterval('PT' . abs($offsetHours) . 'H');
        if ($offsetHours < 0) {
            $interval->invert = 1; // Invert for negative offsets
        }

        // Add or subtract interval
        $datetime->add($interval);

        // Return formatted date with new timezone
        return $datetime->format('Y-m-d H:i:s');
    } catch (Exception $e) {
        // Handle exceptions, such as invalid timezone or date format
        return "Error: " . $e->getMessage();
    }
}

// Example usage
$date = '2024-07-22 10:00:00';
$timezone = 'America/New_York';
$offsetHours = 3;

// Calculate new time with offset
$newTime = calculateTimeWithTimezone($date, $timezone, $offsetHours);
echo $newTime; // Output: 2024-07-22 13:00:00
?>