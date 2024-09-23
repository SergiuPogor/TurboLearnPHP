<?php

// Load a SimpleXML object from a file
$xmlString = file_get_contents('/tmp/test/input.xml');
$simpleXml = simplexml_load_string($xmlString);

// Convert SimpleXML to DOM
$dom = dom_import_simplexml($simpleXml);
$domDocument = $dom->ownerDocument;

// Perform operations using DOMDocument
$domDocument->formatOutput = true;
$xmlOutput = $domDocument->saveXML();

// Save or manipulate the XML as needed
file_put_contents('/tmp/test/output.xml', $xmlOutput);

// Output for verification
echo "XML successfully converted and saved.\n";
echo "Here's the formatted XML:\n";
echo $xmlOutput;

?>