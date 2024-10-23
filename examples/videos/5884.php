<?php

// Establish a connection to PostgreSQL
$conn = pg_connect("host=localhost dbname=mydb user=myuser password=mypass");

// Check connection status
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Get PostgreSQL version information
$version = pg_version($conn);

// Display the version information
echo "PostgreSQL version: " . $version['server'] . "\n";

// Example of handling version-specific features
if (version_compare($version['server'], '12.0', '>=')) {
    // Use a feature available in version 12 and above
    echo "You can use advanced features available in PostgreSQL 12.\n";
} else {
    // Handle cases for older versions
    echo "You might need to update your PostgreSQL to use new features.\n";
}

// Close the connection
pg_close($conn);

?>