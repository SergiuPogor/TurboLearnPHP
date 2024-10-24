<?php

// Use XMLWriter to generate large XML data securely and efficiently

// Initialize the XMLWriter
$xmlWriter = new XMLWriter();
$xmlFile = '/tmp/test/output.xml';
$xmlWriter->openUri($xmlFile);

// Start the XML document
$xmlWriter->startDocument('1.0', 'UTF-8');

// Root element
$xmlWriter->startElement('employees');

// Add a large dataset of employee information
$employeeData = [
    ['name' => 'Alice', 'age' => 30, 'department' => 'IT'],
    ['name' => 'Bob', 'age' => 40, 'department' => 'HR'],
    ['name' => 'Charlie', 'age' => 25, 'department' => 'Finance'],
    // Assume this goes on for thousands of records...
];

foreach ($employeeData as $employee) {
    $xmlWriter->startElement('employee');
    
    // Add employee details as elements
    $xmlWriter->writeElement('name', $employee['name']);
    $xmlWriter->writeElement('age', $employee['age']);
    $xmlWriter->writeElement('department', $employee['department']);
    
    // Close the employee element
    $xmlWriter->endElement(); // employee
}

// ----
// Here's the secret part: Finalize the XML securely
// Using xmlwriter_end_document ensures the XML is complete, especially for large datasets

$xmlWriter->endElement(); // employees
$xmlWriter->endDocument(); // Close the entire XML

// This ensures that any memory used for the XML generation is freed, and
// the file is properly closed, avoiding incomplete or corrupted XML output.

// ----
// Now, let's try the same XML generation but with a unique twist: output to a string buffer
$xmlWriterString = new XMLWriter();
$xmlWriterString->openMemory();
$xmlWriterString->startDocument('1.0', 'UTF-8');

// Root element
$xmlWriterString->startElement('products');

// Simulate large data of products
for ($i = 0; $i < 1000; $i++) {
    $xmlWriterString->startElement('product');
    $xmlWriterString->writeElement('id', $i + 1);
    $xmlWriterString->writeElement('name', "Product_" . ($i + 1));
    $xmlWriterString->writeElement('price', rand(10, 1000));
    $xmlWriterString->endElement(); // product
}

// Finalize the document
$xmlWriterString->endElement(); // products
$xmlWriterString->endDocument(); // Complete the XML string

// Retrieve the XML as a string
$xmlString = $xmlWriterString->outputMemory();
file_put_contents('/tmp/test/products.xml', $xmlString);

// ----
// Advanced Tip: You can manipulate and save this XML string to other storage like databases, or send it over HTTP.
echo "Generated XML saved to /tmp/test/products.xml\n";

// Ensure that both file and memory-based XML generation methods work effectively with large datasets.
?>