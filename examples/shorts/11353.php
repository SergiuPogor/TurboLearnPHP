<?php
// Comparing switch vs if-else performance in PHP

$var = 3;

// Using switch
switch ($var) {
    case 1:
        echo "Case 1\n";
        break;
    case 2:
        echo "Case 2\n";
        break;
    case 3:
        echo "Case 3\n"; // This will be executed
        break;
    default:
        echo "Default\n";
}

// Using if-else
if ($var === 1) {
    echo "Case 1\n";
} elseif ($var === 2) {
    echo "Case 2\n";
} elseif ($var === 3) {
    echo "Case 3\n"; // This will be executed
} else {
    echo "Default\n";
}
?>