<?php
// Using require_once to include a critical file
require_once 'config.php';  // If config.php fails to include, it will stop execution

// Using include_once for a non-critical file
include_once 'header.php';  // If header.php fails to include, execution continues

// Example of conditionally including a file based on user input
if ($_GET['load_special'] == 'true') {
    require_once 'special_feature.php';  // Will stop execution if the file is missing
} else {
    include_once 'standard_feature.php';  // Will continue even if the file is missing
}
?>