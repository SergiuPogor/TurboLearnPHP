<?php

// Example: Parsing XML using xml_set_element_handler() in PHP

// Step 1: Initialize XML Parser
$xmlParser = xml_parser_create();

// Step 2: Define start and end element handlers
function startElement($parser, $name, $attrs) {
    echo "Start Element: $name\n";
    if (!empty($attrs)) {
        echo "Attributes:\n";
        foreach ($attrs as $key => $value) {
            echo "  $key: $value\n";
        }
    }
}

function endElement($parser, $name) {
    echo "End Element: $name\n";
}

// Step 3: Set the element handlers
xml_set_element_handler($xmlParser, 'startElement', 'endElement');

// Step 4: Open XML file
$xmlFile = '/tmp/test/input.xml'; // Path to your XML file

// Step 5: Read and parse XML file
if (!($fp = fopen($xmlFile, 'r'))) {
    die("Could not open XML file.");
}

// Step 6: Parse data
while ($data = fread($fp, 4096)) {
    if (!xml_parse($xmlParser, $data, feof($fp))) {
        die(sprintf("XML error: %s at line %d",
            xml_error_string(xml_get_error_code($xmlParser)),
            xml_get_current_line_number($xmlParser)));
    }
}

// Step 7: Free the XML parser
xml_parser_free($xmlParser);
fclose($fp);

// Example: Working with complex XML data
// Imagine the XML structure is nested and you want to keep track of depth
$depth = 0;

function startElementWithDepth($parser, $name, $attrs) {
    global $depth;
    echo str_repeat(' ', $depth * 2) . "Start Element: $name\n";
    if (!empty($attrs)) {
        echo str_repeat(' ', $depth * 2) . "Attributes:\n";
        foreach ($attrs as $key => $value) {
            echo str_repeat(' ', $depth * 2) . "  $key: $value\n";
        }
    }
    $depth++;
}

function endElementWithDepth($parser, $name) {
    global $depth;
    $depth--;
    echo str_repeat(' ', $depth * 2) . "End Element: $name\n";
}

// Step 8: Use the updated handlers
$xmlParser = xml_parser_create();
xml_set_element_handler($xmlParser, 'startElementWithDepth', 'endElementWithDepth');

// Step 9: Reopen and parse the XML file again for depth tracking
if (!($fp = fopen($xmlFile, 'r'))) {
    die("Could not open XML file.");
}

while ($data = fread($fp, 4096)) {
    if (!xml_parse($xmlParser, $data, feof($fp))) {
        die(sprintf("XML error: %s at line %d",
            xml_error_string(xml_get_error_code($xmlParser)),
            xml_get_current_line_number($xmlParser)));
    }
}

xml_parser_free($xmlParser);
fclose($fp);
?>