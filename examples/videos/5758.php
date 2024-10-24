<?php
// Example demonstrating the use of filter_id()
// to validate filters in PHP.

$filters = [
    "email" => "email",
    "url" => "url",
    "int" => "int",
    "boolean" => "boolean",
    "invalid" => "not_a_filter"
];

foreach ($filters as $name => $filter) {
    $filterId = filter_id($filter); // Get the filter ID

    if ($filterId === false) {
        echo "The filter '$filter' is not valid.\n";
    } else {
        echo "The filter '$filter' is valid with ID: $filterId.\n";
        // Example of applying the filter
        $input = ($name === "email") ? "user@example.com" : "12345";
        $filteredInput = filter_var($input, $filterId);

        echo "Filtered input for '$name': $filteredInput\n";
    }
}

// Dynamic filter application
$dynamicFilter = "url"; // Assume this is determined at runtime
$dynamicFilterId = filter_id($dynamicFilter);

if ($dynamicFilterId !== false) {
    $inputUrl = "https://example.com";
    $validatedUrl = filter_var($inputUrl, $dynamicFilterId);
    echo "Validated URL: $validatedUrl\n";
} else {
    echo "Error: Invalid filter '$dynamicFilter'.\n";
}
?>