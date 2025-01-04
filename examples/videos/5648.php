<?php
// Example of using date_create_from_format() to handle non-standard date formats

// Step 1: Parse a custom date format
$date_string = "31-12-2023 23:59:59";
$format = "d-m-Y H:i:s"; // Day-Month-Year Hour:Minute:Second format
$date = date_create_from_format($format, $date_string);

if (!$date) {
    echo "Error parsing the date.\n";
}

// Step 2: Handle another case with different format (US format)
$date_string_us = "12/31/2023 11:59:59 PM";
$format_us = "m/d/Y h:i:s A"; // Month/Day/Year 12-hour time with AM/PM
$date_us = date_create_from_format($format_us, $date_string_us);

// Step 3: Use the parsed date object for further manipulation
if ($date_us) {
    echo date_format($date_us, "Y-m-d H:i:s") . "\n"; // Output the standardized format
}

// BONUS: Handle edge cases - Parsing date with no leading zeros
$date_string_edge = "1/2/23"; // Date without leading zeros
$format_edge = "j/n/y"; // Day/Month/Year format without leading zeros
$date_edge = date_create_from_format($format_edge, $date_string_edge);

// Handle another edge case - Parsing an incorrect date with missing parts
$date_string_incomplete = "12-2023"; // Missing day
$format_incomplete = "m-Y"; // Month-Year format
$date_incomplete = date_create_from_format($format_incomplete, $date_string_incomplete);

// Check if date creation was successful
if ($date_incomplete) {
    echo date_format($date_incomplete, "Y-m-d") . "\n"; // Display the parsed date
}

// Step 4: Handle legacy system format (example: Unix timestamp stored in string format)
$legacy_date_string = "2023-12-31 23:59";
$legacy_format = "Y-m-d H:i"; // Legacy format without seconds
$date_legacy = date_create_from_format($legacy_format, $legacy_date_string);

// BONUS: Alternative ways to handle parsing errors
$date_invalid = date_create_from_format("Y-m-d", "2023-02-30"); // Invalid date
if (!$date_invalid) {
    // Fallback logic: If parsing fails, create a default date
    $fallback_date = new DateTime("now");
    echo date_format($fallback_date, "Y-m-d H:i:s") . "\n";
}

// Step 5: Create a custom error handler for date parsing issues
function handle_date_error($format, $date_string) {
    $date = date_create_from_format($format, $date_string);
    if (!$date) {
        // Log the error or set a default date
        return new DateTime("1970-01-01 00:00:00"); // Fallback to Unix epoch
    }
    return $date;
}

// Example usage of custom error handler
$custom_date = handle_date_error("d/m/Y", "invalid-date");
echo date_format($custom_date, "Y-m-d H:i:s") . "\n";

?>