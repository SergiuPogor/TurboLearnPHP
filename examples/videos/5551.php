<?php

// A script demonstrating the use of libxml_get_errors() in PHP
// This example processes XML, captures errors, and demonstrates error handling

// Load an XML file for parsing
$xmlFile = '/tmp/test/input.xml'; // Example XML file path
$xmlContent = file_get_contents($xmlFile);
if ($xmlContent === false) {
    die("Unable to read the XML file.");
}

// Enable user error handling
libxml_use_internal_errors(true);

// Load the XML content
$xml = simplexml_load_string($xmlContent);
if ($xml === false) {
    // Handle errors using libxml_get_errors()
    echo "Failed loading XML:\n";
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        echo " - ", $error->message;
    }
    
    // Clear the error buffer
    libxml_clear_errors();
    
    // Additional logic to recover from the error can go here
    // For example, logging the error or loading an alternative XML
    // $xml = simplexml_load_file('/tmp/test/input_fallback.xml');
}

// Process the XML if no errors occurred
if ($xml) {
    foreach ($xml->children() as $child) {
        echo "Child element: " . $child->getName() . "\n";
    }
}

// Clear any remaining errors after processing
libxml_clear_errors();