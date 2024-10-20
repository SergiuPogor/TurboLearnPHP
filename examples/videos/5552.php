<?php

// This script demonstrates the use of xml_set_external_entity_ref_handler()
// to securely manage external entity references during XML parsing.

$xmlFile = '/tmp/test/input.xml'; // Path to the XML file
$xmlContent = file_get_contents($xmlFile);

if ($xmlContent === false) {
    die("Unable to read the XML file.");
}

// Enable internal error handling
libxml_use_internal_errors(true);

// Custom handler for external entities
function handleExternalEntity($public, $system) {
    // Log the request or ignore it based on your security policy
    echo "External entity requested: Public: $public, System: $system\n";
    
    // Return an empty string to prevent processing of external entities
    return '';
}

// Set the custom external entity handler
xml_set_external_entity_ref_handler('handleExternalEntity');

// Load the XML content
$xml = xml_parser_create();
if (!xml_parse($xml, $xmlContent)) {
    echo "Failed loading XML:\n";
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        echo " - ", $error->message;
    }
    libxml_clear_errors();
}

// Clean up
xml_parser_free($xml);
libxml_clear_errors();