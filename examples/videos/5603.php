<?php

// Function to convert Julian date to Unix timestamp
function convertJulianToUnix($julianDate) {
    // Check if the Julian date is valid
    if ($julianDate < 0) {
        return "Invalid Julian date";
    }
    
    // Convert Julian date to Unix timestamp
    $unixTimestamp = jdtounix($julianDate);
    
    // Return the Unix timestamp
    return $unixTimestamp;
}

// Example usage of the conversion function
$julianDate = 2459952; // Example Julian date for October 20, 2023
$unixTimestamp = convertJulianToUnix($julianDate);

// Output the result
echo "Unix timestamp for Julian date $julianDate: $unixTimestamp";

// Another example to demonstrate using current Julian date
$currentJulian = GregorianToJD(10, 20, 2023); // Convert current date to Julian
$currentUnixTimestamp = convertJulianToUnix($currentJulian);

// Output current Unix timestamp
echo "\nUnix timestamp for today's Julian date: $currentUnixTimestamp";

// Handling an invalid Julian date
$invalidJulian = -1;
$invalidResult = convertJulianToUnix($invalidJulian);

// Output the invalid result
echo "\nResult for invalid Julian date: $invalidResult";

?>