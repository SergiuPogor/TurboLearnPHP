<?php

// Function to convert Jewish date to Julian Day Count
function convertJewishDateToJD($hebrewMonth, $hebrewDay, $hebrewYear)
{
    // Convert the Jewish date using jewishtojd()
    $julianDayCount = jewishtojd($hebrewMonth, $hebrewDay, $hebrewYear);
    
    // Check if the conversion was successful
    if ($julianDayCount === false) {
        throw new Exception("Invalid Jewish date provided.");
    }

    return $julianDayCount;
}

// Function to display the conversion result
function displayConversion($hebrewMonth, $hebrewDay, $hebrewYear)
{
    try {
        $jd = convertJewishDateToJD($hebrewMonth, $hebrewDay, $hebrewYear);
        
        // Display the Julian Day Count
        echo "The Julian Day Count for the Jewish date $hebrewMonth/$hebrewDay/$hebrewYear is: $jd" . PHP_EOL;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . PHP_EOL;
    }
}

// Example usage: Replace with valid Jewish date components
$testHebrewMonth = 6; // Sivan
$testHebrewDay = 10;  // 10th
$testHebrewYear = 5784; // 5784 in the Hebrew calendar

displayConversion($testHebrewMonth, $testHebrewDay, $testHebrewYear);

?>