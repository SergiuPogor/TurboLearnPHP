<?php

// Define a dynamic date format using user preferences and predefined formats
$userPreferences = [
    'short' => 'd/m/Y',
    'long' => 'l, F j, Y',
    'time' => 'H:i:s',
    'custom' => 'Y-m-d H:i:s'
];

// Function to get the formatted date based on user preference
function getFormattedDate(string $formatType, array $formats): string
{
    // Check if the format type exists in user preferences
    if (!array_key_exists($formatType, $formats)) {
        // Default format if the type is not found
        $formatType = 'short';
    }

    return date($formats[$formatType]);
}

// Display the date in different formats
echo "Short Format: " . getFormattedDate('short', $userPreferences) . PHP_EOL;
echo "Long Format: " . getFormattedDate('long', $userPreferences) . PHP_EOL;
echo "Time Format: " . getFormattedDate('time', $userPreferences) . PHP_EOL;
echo "Custom Format: " . getFormattedDate('custom', $userPreferences) . PHP_EOL;

// More complex use-case: user-defined custom format and fallback mechanism
$customUserFormat = 'jS M, Y - H:i';
$defaultFormat = 'd-m-Y H:i:s';

// Function to handle user-defined custom formats with fallback
function getUserFormattedDate(string $userFormat, string $fallbackFormat): string
{
    // Validate custom user format, if invalid fall back to default
    $validFormat = date_create_from_format($userFormat, date($userFormat)) ? $userFormat : $fallbackFormat;

    return date($validFormat);
}

echo "User Defined Format: " . getUserFormattedDate($customUserFormat, $defaultFormat) . PHP_EOL;

// Date formatting with time zones
function getDateWithTimezone(string $format, string $timezone): string
{
    $date = new DateTime('now', new DateTimeZone($timezone));
    return $date->format($format);
}

echo "Date in GMT: " . getDateWithTimezone('Y-m-d H:i:s', 'GMT') . PHP_EOL;
echo "Date in New York: " . getDateWithTimezone('Y-m-d H:i:s', 'America/New_York') . PHP_EOL;

// Handling different date formats based on user locale
function getLocalizedDateFormat(string $locale, string $timestamp): string
{
    $formats = [
        'en_US' => 'F j, Y',
        'fr_FR' => 'j F Y',
        'de_DE' => 'd. F Y'
    ];

    // Fallback to US format if the locale is not supported
    $format = $formats[$locale] ?? $formats['en_US'];

    return date($format, strtotime($timestamp));
}

echo "Localized Date (French): " . getLocalizedDateFormat('fr_FR', '2024-08-24') . PHP_EOL;
echo "Localized Date (German): " . getLocalizedDateFormat('de_DE', '2024-08-24') . PHP_EOL;
echo "Localized Date (Default): " . getLocalizedDateFormat('es_ES', '2024-08-24') . PHP_EOL;

?>