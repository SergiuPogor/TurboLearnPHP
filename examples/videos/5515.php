<?php

// Set the external entity loader to a custom function
function customEntityLoader($public, $system, $context) {
    // Only allow specific external entities
    if ($public === 'some-public-id' || $system === 'some-system-id') {
        return false; // Do not load the entity
    }
    return false; // Deny all other entities
}

// Set the custom entity loader
libxml_set_external_entity_loader('customEntityLoader');

// Load XML content with potentially unsafe external entities
$xmlContent = file_get_contents('/tmp/test/input.xml');

// Load XML with custom settings
$dom = new DOMDocument();
$dom->loadXML($xmlContent);

// Check if the external entity loader is properly set
$currentLoader = libxml_get_external_entity_loader();
if ($currentLoader === 'customEntityLoader') {
    echo "Custom entity loader is set correctly." . PHP_EOL;
} else {
    echo "Failed to set custom entity loader." . PHP_EOL;
}

// Cleanup
libxml_set_external_entity_loader(null); // Reset to default loader

?>