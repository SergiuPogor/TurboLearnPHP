<?php
// A practical example of using getdate() in a real-world application
// for dynamically generating time ranges for event filtering or reports.

$current_date = getdate();
echo "Current Year: " . $current_date['year'] . "\n";
echo "Current Month: " . $current_date['mon'] . "\n";
echo "Current Day: " . $current_date['mday'] . "\n";
echo "Current Hour: " . $current_date['hours'] . "\n";

// 1. Generate a start and end date range for a report (e.g., weekly report)
// Automatically calculate the start of the week (Monday) and the end (Sunday)
function getWeekRange($date) {
    $week_start = strtotime('Monday this week', mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year']));
    $week_end = strtotime('Sunday this week', mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year']));
    return [
        'start' => date('Y-m-d', $week_start),
        'end' => date('Y-m-d', $week_end)
    ];
}

$week_range = getWeekRange($current_date);
echo "Weekly Report Range: " . $week_range['start'] . " to " . $week_range['end'] . "\n";

// 2. Dynamic filtering by month: Get all events from the current month
// This helps avoid manual calculations by using the `getdate()` structure.
$start_of_month = mktime(0, 0, 0, $current_date['mon'], 1, $current_date['year']);
$end_of_month = mktime(23, 59, 59, $current_date['mon'] + 1, 0, $current_date['year']);

echo "Current Month Range: " . date('Y-m-d', $start_of_month) . " to " . date('Y-m-d', $end_of_month) . "\n";

// 3. Dealing with Time Zones: Convert the current time to UTC
// Using getdate() helps you manage components before adjusting time zones.
date_default_timezone_set('America/New_York');
$current_local_time = getdate();

echo "Local Time: " . $current_local_time['hours'] . ":" . $current_local_time['minutes'] . "\n";

date_default_timezone_set('UTC');
$current_utc_time = getdate();

echo "UTC Time: " . $current_utc_time['hours'] . ":" . $current_utc_time['minutes'] . "\n";

// 4. Advanced Case: Generating date intervals for a recurring event
// Suppose you need to get the next 5 occurrences of a bi-weekly event starting from today.
function getNextOccurrences($current_date, $interval_days, $occurrences_count) {
    $next_occurrences = [];
    for ($i = 0; $i < $occurrences_count; $i++) {
        $next_occurrence = strtotime("+$i weeks", mktime(0, 0, 0, $current_date['mon'], $current_date['mday'], $current_date['year']));
        $next_occurrences[] = date('Y-m-d', $next_occurrence);
    }
    return $next_occurrences;
}

$bi_weekly_occurrences = getNextOccurrences($current_date, 14, 5);
echo "Next 5 Bi-Weekly Event Dates:\n";
print_r($bi_weekly_occurrences);

// Additional Date Utility: Adjusting a Date Component
// If you need to adjust only the 'month' part without affecting the others.
function adjustMonth($date, $adjustment) {
    $new_date = mktime(0, 0, 0, $date['mon'] + $adjustment, $date['mday'], $date['year']);
    return getdate($new_date);
}

$adjusted_date = adjustMonth($current_date, -2); // Adjust date by subtracting 2 months
echo "Date After Adjusting Month: " . $adjusted_date['year'] . "-" . $adjusted_date['mon'] . "-" . $adjusted_date['mday'] . "\n";

// Clean-up code if used with actual date storage (e.g., session, caching)
?>