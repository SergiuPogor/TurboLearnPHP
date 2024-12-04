<?php
// Example 1: Using exit() for normal script termination
echo "This will run until exit() is called.";
exit("Script terminated with exit()");  // Stops the script here

// Example 2: Using die() for error handling
echo "This will run until die() is called.";
die("Error: Script terminated with die()");  // Stops the script here with an error message

// Example 3: Using exit() with a status code
echo "Running until exit with code.";
exit(1);  // Terminates the script and returns status code 1 to OS
?>