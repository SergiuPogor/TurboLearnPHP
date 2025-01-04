<?php

// Example: Using timezone_abbreviations_list() to display time zone options

// Step 1: Get the list of time zone abbreviations
$timeZoneAbbreviations = timezone_abbreviations_list();

// Step 2: Prepare an array to hold formatted time zones
$timeZones = [];

// Step 3: Loop through the time zone abbreviations
foreach ($timeZoneAbbreviations as $region => $zones) {
    foreach ($zones as $zone) {
        // Step 4: Format and add time zone data to the array
        $timeZones[] = [
            'timezone' => $zone['timezone_id'],
            'abbreviation' => $zone['timezone_abbr'],
            'offset' => $zone['offset'],
            'isdst' => $zone['dst']
        ];
    }
}

// Step 5: Sort time zones by offset for better user experience
usort($timeZones, function ($a, $b) {
    return $a['offset'] <=> $b['offset'];
});

// Step 6: Display the time zones
echo "Available Time Zones:\n";
foreach ($timeZones as $timeZone) {
    echo "{$timeZone['timezone']} ({$timeZone['abbreviation']}) - Offset: {$timeZone['offset']} - DST: " . ($timeZone['isdst'] ? 'Yes' : 'No') . "\n";
}

?>