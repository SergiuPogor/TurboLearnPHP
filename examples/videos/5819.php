<?php

// Use case: You are generating an XML file that needs to follow a custom structure, 
// enforced by a DTD (Document Type Definition). This is crucial in applications where 
// XML must be validated against certain rules, like data imports or API XML responses.

// Initialize the XMLWriter object
$writer = new XMLWriter();

// Output XML to a file
$writer->openUri('/tmp/test/custom_dtd.xml');

// Start the XML document
$writer->startDocument('1.0', 'UTF-8');

// Define the root element
$writer->startDtd('bookstore');

// Define a custom DTD element, for example, a 'book' element that must contain a title
$writer->startDtdElement('book');
$writer->text('title CDATA #REQUIRED');
$writer->endDtdElement();

// End the DTD and start the root element
$writer->endDtd();
$writer->startElement('bookstore');

// Create a book entry using the structure defined by the DTD
$writer->startElement('book');
$writer->writeElement('title', 'Mastering PHP XML Writer');
$writer->endElement(); // End 'book' element

// Add another book to test the DTD structure
$writer->startElement('book');
$writer->writeElement('title', 'Advanced XML Handling in PHP');
$writer->endElement(); // End 'book' element

// End the root element
$writer->endElement(); // End 'bookstore' element

// End the XML document
$writer->endDocument();

// Flush and close the writer
$writer->flush();

// ----
// Let's extend this by showing how the DTD can enforce structure. Suppose we have an XML 
// structure where we want every 'book' element to have both a 'title' and an 'author'.

$writer = new XMLWriter();
$writer->openUri('/tmp/test/extended_dtd.xml');
$writer->startDocument('1.0', 'UTF-8');
$writer->startDtd('library');

// Define the structure where 'book' must have both 'title' and 'author'
$writer->startDtdElement('book');
$writer->text('title CDATA #REQUIRED');
$writer->text('author CDATA #REQUIRED');
$writer->endDtdElement();

$writer->endDtd();
$writer->startElement('library');

// Create a book that follows the extended DTD rules
$writer->startElement('book');
$writer->writeElement('title', 'Learning PHP and XML');
$writer->writeElement('author', 'John Doe');
$writer->endElement(); // End 'book' element

// Another book with the required fields
$writer->startElement('book');
$writer->writeElement('title', 'XML for Beginners');
$writer->writeElement('author', 'Jane Smith');
$writer->endElement(); // End 'book' element

$writer->endElement(); // End 'library' element
$writer->endDocument();
$writer->flush();

// ----
// Advanced scenario: Building dynamic XML with user-supplied data and DTD validation.
// Assume the data comes from a user form input or API request.

$books = [
    ['title' => 'PHP for Experts', 'author' => 'Alex King'],
    ['title' => 'XML Power', 'author' => 'Megan Allen'],
];

$writer = new XMLWriter();
$writer->openUri('/tmp/test/dynamic_dtd.xml');
$writer->startDocument('1.0', 'UTF-8');
$writer->startDtd('bookshelf');

// DTD element where 'book' requires both 'title' and 'author'
$writer->startDtdElement('book');
$writer->text('title CDATA #REQUIRED');
$writer->text('author CDATA #REQUIRED');
$writer->endDtdElement();

$writer->endDtd();
$writer->startElement('bookshelf');

// Loop through dynamic data and build XML
foreach ($books as $book) {
    $writer->startElement('book');
    $writer->writeElement('title', $book['title']);
    $writer->writeElement('author', $book['author']);
    $writer->endElement(); // End 'book' element
}

$writer->endElement(); // End 'bookshelf' element
$writer->endDocument();
$writer->flush();

// ----
// With this setup, your XML follows a strict structure, ensuring that any missing required elements will raise an error during validation.
?>