<?php

// Define a custom loader function
function customEntityLoader($publicId, $systemId, $context) {
    // Log or validate the external entity request
    // For demonstration, only allow specific entities
    $allowedEntities = [
        'allowed.dtd',
    ];
    $parsedUrl = parse_url($systemId);
    if (isset($parsedUrl['path']) && in_array(basename($parsedUrl['path']), $allowedEntities)) {
        return fopen($systemId, 'r');
    }
    return false; // Deny access to disallowed entities
}

// Set the custom loader for external entities
libxml_set_external_entity_loader('customEntityLoader');

// Load an XML document (ensure that XML data is available in the specified path)
$xmlContent = file_get_contents('/tmp/test/input.xml');
$xml = simplexml_load_string($xmlContent, null, LIBXML_NOENT);

// Check for errors
if ($xml === false) {
    echo "Failed to load XML.\n";
    foreach (libxml_get_errors() as $error) {
        echo "Error: ", $error->message;
    }
} else {
    echo "XML loaded successfully.\n";
    print_r($xml);
}

// Clean up
libxml_clear_errors();
?>