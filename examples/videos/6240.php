<?php

// Set initial date
$initialDate = new DateTime('2023-10-11');

// Example 1: Adding days to a date
$modifiedDate1 = clone $initialDate;
$modifiedDate1->modify('+10 days');
echo "Initial Date: " . $initialDate->format('Y-m-d') . "\n";
echo "Date after adding 10 days: " . $modifiedDate1->format('Y-m-d') . "\n";

// Example 2: Subtracting months
$modifiedDate2 = clone $initialDate;
$modifiedDate2->modify('-2 months');
echo "Date after subtracting 2 months: " . $modifiedDate2->format('Y-m-d') . "\n";

// Example 3: Adding years
$modifiedDate3 = clone $initialDate;
$modifiedDate3->modify('+3 years');
echo "Date after adding 3 years: " . $modifiedDate3->format('Y-m-d') . "\n";

// Example 4: Complex modifications
$modifiedDate4 = clone $initialDate;
$modifiedDate4->modify('+1 year -2 months +5 days');
echo "Date after a complex modification (+1 year, -2 months, +5 days): " . $modifiedDate4->format('Y-m-d') . "\n";

// Example 5: Dynamic user input
$userModification = '+15 days -1 month';
try {
    $modifiedDate5 = clone $initialDate;
    $modifiedDate5->modify($userModification);
    echo "Date after user modification ($userModification): " . $modifiedDate5->format('Y-m-d') . "\n";
} catch (Exception $e) {
    echo "Error: Invalid user modification string.\n";
}

// Example 6: Invalid modification input handling
try {
    $modifiedDate6 = clone $initialDate;
    $modifiedDate6->modify('invalid modification');
    echo "Modified Date: " . $modifiedDate6->format('Y-m-d') . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Example 7: Scheduling scenario
function adjustEventDate(DateTime $eventDate, string $adjustment): DateTime
{
    try {
        $adjustedDate = clone $eventDate;
        $adjustedDate->modify($adjustment);
        return $adjustedDate;
    } catch (Exception $e) {
        echo "Error adjusting event date: " . $e->getMessage() . "\n";
        return clone $eventDate; // Return original date on failure
    }
}

$eventDate = new DateTime('2024-06-01');
$adjustedEventDate = adjustEventDate($eventDate, '+30 days -1 week');
echo "Original Event Date: " . $eventDate->format('Y-m-d') . "\n";
echo "Adjusted Event Date (+30 days, -1 week): " . $adjustedEventDate->format('Y-m-d') . "\n";

// Example 8: Scheduling multiple dates dynamically
$scheduleDates = [
    'meeting' => '+1 week',
    'conference' => '+2 months',
    'project_deadline' => '-3 days'
];

foreach ($scheduleDates as $event => $adjustment) {
    $adjustedDate = adjustEventDate($initialDate, $adjustment);
    echo ucfirst($event) . " scheduled for: " . $adjustedDate->format('Y-m-d') . "\n";
}

