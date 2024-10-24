<?php
// Example: Using xml_parse_into_struct() to convert XML to PHP arrays

// Sample XML string
$xmlData = <<<XML
<library>
    <book>
        <title>Understanding PHP</title>
        <author>Jane Doe</author>
        <year>2023</year>
    </book>
    <book>
        <title>Advanced PHP Techniques</title>
        <author>John Smith</author>
        <year>2024</year>
    </book>
</library>
XML;

// Step 1: Initialize XML parser
$xmlParser = xml_parser_create();

// Step 2: Parse the XML data into a structured array
if (!xml_parse_into_struct($xmlParser, $xmlData, $xmlArray)) {
    die("XML Parse Error: " . xml_error_string(xml_get_error_code($xmlParser)));
}

// Step 3: Free the XML parser resource
xml_parser_free($xmlParser);

// Step 4: Display the structured array
print_r($xmlArray);

// Step 5: Extract relevant data from the structured array
$books = [];
foreach ($xmlArray as $element) {
    if ($element['tag'] === 'BOOK') {
        $books[] = [
            'title' => $element['children'][0]['value'],
            'author' => $element['children'][1]['value'],
            'year' => $element['children'][2]['value']
        ];
    }
}

// Output the extracted books
echo "Extracted Books:\n";
foreach ($books as $book) {
    echo "Title: {$book['title']}, Author: {$book['author']}, Year: {$book['year']}\n";
}

// Step 6: Handle XML file input
$xmlFilePath = '/tmp/test/input.xml';

// Ensure the file exists
if (file_exists($xmlFilePath)) {
    // Load the XML from the file
    $fileContent = file_get_contents($xmlFilePath);
    
    // Reinitialize parser for file content
    $xmlParserFile = xml_parser_create();
    
    // Parse the XML file content
    if (!xml_parse_into_struct($xmlParserFile, $fileContent, $xmlArrayFile)) {
        die("XML Parse Error: " . xml_error_string(xml_get_error_code($xmlParserFile)));
    }
    
    // Free the XML parser resource
    xml_parser_free($xmlParserFile);
    
    // Display the structured array from the file
    print_r($xmlArrayFile);
} else {
    echo "XML file not found: " . $xmlFilePath . "\n";
}
?>