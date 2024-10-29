<?php
// Check current PHP version
$currentVersion = PHP_VERSION;

// Define the minimum required PHP version
$minVersion = '8.0.0';

// Compare the current version with the minimum required version
if (version_compare($currentVersion, $minVersion, '<')) {
    die("Your PHP version ($currentVersion) is too old. Please upgrade to at least PHP $minVersion.");
}

// If the code continues, the PHP version is compatible
echo "Your PHP version ($currentVersion) is compatible with this application.";

// Example of checking compatibility with other versions
$supportedVersions = ['7.4.0', '8.0.0', '8.1.0'];

foreach ($supportedVersions as $version) {
    if (version_compare($currentVersion, $version, '>=')) {
        echo "\nYour code will work with PHP version $version.";
    } else {
        echo "\nYour code is not compatible with PHP version $version.";
    }
}