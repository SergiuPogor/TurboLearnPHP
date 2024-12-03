<?php

// Using switch statement
$day = 'Monday';

switch ($day) {
    case 'Monday':
        echo "Start of the week\n";
        break;
    case 'Tuesday':
        echo "Second day\n";
        break;
    case 'Wednesday':
        echo "Midweek\n";
        break;
    default:
        echo "Not a weekday\n";
}

// Using if-else statement
$day = 'Monday';

if ($day === 'Monday') {
    echo "Start of the week\n";
} elseif ($day === 'Tuesday') {
    echo "Second day\n";
} elseif ($day === 'Wednesday') {
    echo "Midweek\n";
} else {
    echo "Not a weekday\n";
}

?>