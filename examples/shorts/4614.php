<?php

// Example: Efficient XML Parsing and Manipulation with PHP DOMDocument
$xmlString = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<books>
    <book>
        <title>PHP Advanced Techniques</title>
        <author>John Doe</author>
        <price>29.99</price>
    </book>
    <book>
        <title>Mastering XML Parsing</title>
        <author>Jane Smith</author>
        <price>39.99</price>
    </book>
</books>
XML;

// Load XML string into DOMDocument
$dom = new DOMDocument();
$dom->loadXML($xmlString);

// Example: Retrieving and outputting book information using XPath
$xpath = new DOMXPath($dom);
$books = $xpath->query("//book");

foreach ($books as $book) {
    $title = $xpath->query("title", $book)->item(0)->textContent;
    $author = $xpath->query("author", $book)->item(0)->textContent;
    $price = $xpath->query("price", $book)->item(0)->textContent;
    
    echo "Title: $title | Author: $author | Price: $$price\n";
}

// Example: Adding a new book to the XML document
$newBook = $dom->createElement("book");
$newTitle = $dom->createElement("title", "PHP Best Practices");
$newAuthor = $dom->createElement("author", "David Johnson");
$newPrice = $dom->createElement("price", "49.99");
$newBook->appendChild($newTitle);
$newBook->appendChild($newAuthor);
$newBook->appendChild($newPrice);
$dom->documentElement->appendChild($newBook);

// Save the modified XML to a file
$dom->save("/path/to/newbooks.xml");

?>