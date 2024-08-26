<?php

// Load the XML file into a SimpleXMLElement object
$xml_file = '/tmp/test/input.xml';
$xml = simplexml_load_file($xml_file);

// Check if loading was successful
if ($xml === false) {
    die("Failed to load XML file.");
}

// Accessing elements from the XML
foreach ($xml->children() as $child) {
    echo "Element Name: " . $child->getName() . "\n";
    echo "Element Value: " . (string)$child . "\n";
}

// Error handling: Check for XML parsing errors
libxml_use_internal_errors(true);
if ($xml === false) {
    echo "Failed loading XML: \n";
    foreach (libxml_get_errors() as $error) {
        echo "\t", $error->message;
    }
    libxml_clear_errors();
}

// Example: Accessing specific nodes
if (isset($xml->item)) {
    foreach ($xml->item as $item) {
        echo "Item Name: " . $item->name . "\n";
        echo "Item Price: " . $item->price . "\n";
    }
}

?>