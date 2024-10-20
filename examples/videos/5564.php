<?php

// Example: Handling XML errors manually using libxml_use_internal_errors()

// Enable internal error handling
libxml_use_internal_errors(true);

// Scenario 1: Parsing invalid XML data from a user input or external API
$invalidXml = '<note><to>User</to><from>Admin</from><heading>Reminder</heading><body>Do not forget!</body>'; // Missing closing </note>

$xml = simplexml_load_string($invalidXml);

// Check if the XML was loaded successfully
if ($xml === false) {
    // Fetch and display all XML errors
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        echo "XML Error: " . $error->message . " at line " . $error->line . "\n";
    }
    // Clear the error buffer after handling
    libxml_clear_errors();
}

// Scenario 2: Using libxml for validating XML file before processing
$xmlFilePath = '/tmp/test/input.xml'; // Assume this file contains XML content

if (file_exists($xmlFilePath)) {
    $xmlFileContent = file_get_contents($xmlFilePath);

    $xml = simplexml_load_string($xmlFileContent);

    if ($xml === false) {
        // Detect and log errors while parsing the file
        $errors = libxml_get_errors();
        error_log("Failed to load XML file: " . $xmlFilePath);
        foreach ($errors as $error) {
            error_log("Error in file: " . $error->message . " at line " . $error->line);
        }
        libxml_clear_errors(); // Always clear the errors after use
    } else {
        echo "XML file successfully loaded.\n";
    }
}

// Scenario 3: Try-catch method for better error management in real-time applications
function parseXmlData($xmlString)
{
    libxml_use_internal_errors(true); // Enable internal error handling
    
    $xml = simplexml_load_string($xmlString);
    
    if ($xml === false) {
        $errors = libxml_get_errors();
        foreach ($errors as $error) {
            echo "Parsing failed: " . $error->message . " at line " . $error->line . "\n";
        }
        libxml_clear_errors(); // Clean up
        return null;
    }
    return $xml;
}

$xmlData = '<book><title>PHP Basics</title><author>John Doe</author></book>';
$parsedXml = parseXmlData($xmlData);

// Scenario 4: Loading XML from a remote API with possible malformed data
$remoteXmlUrl = 'https://example.com/data.xml';

try {
    $remoteXmlContent = file_get_contents($remoteXmlUrl);
    if ($remoteXmlContent === false) {
        throw new Exception('Failed to fetch XML from remote source.');
    }

    $xml = simplexml_load_string($remoteXmlContent);
    if ($xml === false) {
        throw new Exception('Error parsing the remote XML data.');
    }

    echo "Successfully fetched and parsed remote XML data.\n";

} catch (Exception $e) {
    // Log or handle exceptions accordingly
    error_log($e->getMessage());
}

// Scenario 5: Handling large XML documents and tracking errors during parsing
$largeXmlContent = str_repeat('<item>Data</item>', 10000); // Simulating large XML data
$largeXmlWrapper = "<root>$largeXmlContent</root>";

$xml = simplexml_load_string($largeXmlWrapper);

if ($xml === false) {
    foreach (libxml_get_errors() as $error) {
        echo "Error in large XML: " . $error->message . "\n";
    }
    libxml_clear_errors();
} else {
    echo "Large XML parsed successfully.\n";
}

?>