<?php

// Function to demonstrate the use of filter_list() for listing available filters
function listAvailableFilters() {
    // Get the list of all available filters
    $filters = filter_list();
    
    // Check if filter_list() returned any filters
    if ($filters === false) {
        throw new RuntimeException('Unable to retrieve filters.');
    }
    
    // Output the list of available filters
    foreach ($filters as $filter) {
        echo "Available filter: $filter\n";
    }
}

// Example usage
listAvailableFilters();

?>