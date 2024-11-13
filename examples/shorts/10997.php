<?php
// Using die() to stop script execution and output a message
if (!$dbConnection) {
    die("Database connection failed!");
}

// Using exit() to stop script execution with a different message
if (!$dbConnection) {
    exit("Database connection failed, terminating script...");
}

// Both die() and exit() can also be used without any message
exit; // The script will stop here without any message.
die; // Same result as exit(), but die() is used more in error handling.
?>