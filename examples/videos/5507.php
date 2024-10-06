<?php

// Create an XML writer instance
$xml = new XMLWriter();
$xml->openMemory();

// Start the XML document
$xml->startDocument('1.0', 'UTF-8');

// Write root element
$xml->startElement('root');

// Write a child element with attributes and text content
$xml->startElement('child');
$xml->writeAttribute('attribute', 'value');
$xml->text('This is the content of the child element.');
$xml->endElement(); // End child

// Write another child element with nested elements
$xml->startElement('parent');
$xml->startElement('child');
$xml->text('Nested content');
$xml->endElement(); // End child
$xml->endElement(); // End parent

// End root element
$xml->endElement();

// End the document
$xml->endDocument();

// Output the XML
echo $xml->outputMemory();
?>