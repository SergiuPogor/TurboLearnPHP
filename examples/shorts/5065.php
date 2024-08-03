<?php

// Function to get the date of Easter for a given year
function getEasterDate(int $year): string {
    $timestamp = easter_date($year);
    return date('Y-m-d', $timestamp);
}

// Example usage in a real-world scenario

// Define a range of years to calculate Easter dates for
$years = [2022, 2023, 2024, 2025, 2026];

// Calculate and print the date of Easter for each year
foreach ($years as $year) {
    $easterDate = getEasterDate($year);
    echo "Easter Sunday in $year falls on $easterDate.\n";
}

// This demonstrates how to handle holiday date calculations efficiently
?>