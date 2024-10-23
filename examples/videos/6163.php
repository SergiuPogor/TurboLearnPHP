<?php

// XML parser initialization
$xmlParser = xml_parser_create();

// Set up an XML handler to track the current column
xml_set_element_handler($xmlParser, "startElement", "endElement");
xml_set_character_data_handler($xmlParser, "characterData");

// Sample XML data
$xmlData = "<root>
                <item>Item 1</item>
                <item>Item 2</item>
            </root>";

// Start parsing
if (!xml_parse($xmlParser, $xmlData, true)) {
    $errorCode = xml_get_error_code($xmlParser);
    $errorColumn = xml_get_current_column_number($xmlParser);
    
    echo "XML Error: " . xml_error_string($errorCode) . "\n";
    echo "Error at column: " . $errorColumn . "\n";
}

// Handler functions
function startElement($parser, $name, $attrs) {
    // Start element processing
}

function endElement($parser, $name) {
    // End element processing
}

function characterData($parser, $data) {
    // Character data processing
}

// Free the XML parser
xml_parser_free($xmlParser);

?>