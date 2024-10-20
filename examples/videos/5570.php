<?php

// Example: Creating an XML document with xmlwriter_start_document()

// Initialize xmlwriter
$xmlWriter = xmlwriter_open_memory();

// Start the XML document with version and encoding
xmlwriter_start_document($xmlWriter, '1.0', 'UTF-8');

// Start the root element
xmlwriter_start_element($xmlWriter, 'library');

// Adding a book element
xmlwriter_start_element($xmlWriter, 'book');
xmlwriter_write_element($xmlWriter, 'title', 'PHP Programming Basics');
xmlwriter_write_element($xmlWriter, 'author', 'John Doe');
xmlwriter_write_element($xmlWriter, 'year', '2024');
xmlwriter_end_element($xmlWriter); // End book element

// Adding another book element
xmlwriter_start_element($xmlWriter, 'book');
xmlwriter_write_element($xmlWriter, 'title', 'Advanced PHP Techniques');
xmlwriter_write_element($xmlWriter, 'author', 'Jane Smith');
xmlwriter_write_element($xmlWriter, 'year', '2024');
xmlwriter_end_element($xmlWriter); // End book element

// End the root element
xmlwriter_end_element($xmlWriter); // End library

// Finish the XML document
xmlwriter_end_document($xmlWriter);

// Get the XML string
$xmlOutput = xmlwriter_output_memory($xmlWriter);

// Display the XML output
echo $xmlOutput;

// Clean up
xmlwriter_free($xmlWriter);

?>