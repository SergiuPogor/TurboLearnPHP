<?php

// Example: Using xmlwriter_start_element() to create XML documents in PHP

// Initialize the XMLWriter
$xml = new XMLWriter();
$xml->openMemory();
$xml->startDocument('1.0', 'UTF-8');

// Start the root element
$xml->startElement('Library');

// Add a Book element with nested elements
$xml->startElement('Book');
$xml->writeElement('Title', '1984');
$xml->writeElement('Author', 'George Orwell');
$xml->writeElement('Year', '1949');
$xml->endElement(); // End Book

// Add another Book element
$xml->startElement('Book');
$xml->writeElement('Title', 'Brave New World');
$xml->writeElement('Author', 'Aldous Huxley');
$xml->writeElement('Year', '1932');
$xml->endElement(); // End Book

// Add a nested element for genres
$xml->startElement('Genres');
$xml->writeElement('Genre', 'Dystopian');
$xml->writeElement('Genre', 'Science Fiction');
$xml->endElement(); // End Genres

// End the root element
$xml->endElement(); // End Library

// Finish the document
$xml->endDocument();

// Get the XML content
$xmlContent = $xml->outputMemory();

// Save the XML content to a file
file_put_contents('/tmp/test/library.xml', $xmlContent);

// Now let's demonstrate creating nested structures dynamically
$books = [
    ['Title' => 'Fahrenheit 451', 'Author' => 'Ray Bradbury', 'Year' => '1953'],
    ['Title' => 'The Handmaid\'s Tale', 'Author' => 'Margaret Atwood', 'Year' => '1985']
];

$xmlDynamic = new XMLWriter();
$xmlDynamic->openMemory();
$xmlDynamic->startDocument('1.0', 'UTF-8');
$xmlDynamic->startElement('Library');

foreach ($books as $book) {
    $xmlDynamic->startElement('Book');
    $xmlDynamic->writeElement('Title', $book['Title']);
    $xmlDynamic->writeElement('Author', $book['Author']);
    $xmlDynamic->writeElement('Year', $book['Year']);
    $xmlDynamic->endElement(); // End Book
}

$xmlDynamic->endElement(); // End Library
$xmlDynamic->endDocument();

$dynamicContent = $xmlDynamic->outputMemory();
file_put_contents('/tmp/test/dynamic_library.xml', $dynamicContent);

?>