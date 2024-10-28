<?php
// File: /tmp/test/build_query_example.php

// Sample data to be sent as URL parameters
$params = [
    'search' => 'PHP tips',
    'page' => 1,
    'sort' => 'relevance',
    'filter' => [
        'category' => 'tutorials',
        'difficulty' => 'beginner'
    ]
];

// Build query string from the parameters
$queryString = http_build_query($params, '', '&', PHP_QUERY_RFC3986);

// Output the complete URL (base URL example)
$baseUrl = "https://example.com/search";
$fullUrl = $baseUrl . '?' . $queryString;

// Display the complete URL
echo "Generated URL: " . $fullUrl; // Generated URL: https://example.com/search?search=PHP%20tips&page=1&sort=relevance&filter%5Bcategory%5D=tutorials&filter%5Bdifficulty%5D=beginner
?>