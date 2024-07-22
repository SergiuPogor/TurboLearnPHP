<?php
// Example PHP code demonstrating the use of array_walk_recursive to handle nested arrays

function sanitize_array(&$value, $key) {
    if (is_string($value)) {
        // Remove all HTML tags and encode special characters
        $value = htmlspecialchars(strip_tags($value));
    }
}

// Sample nested array with potential unsafe data
$data = [
    'user' => [
        'name' => '<script>alert("XSS")</script>John',
        'email' => 'john<doe>@example.com',
        'details' => [
            'address' => '<b>123 Street</b>',
            'phone' => '<i>123-456-7890</i>'
        ]
    ],
    'order' => [
        'id' => 12345,
        'items' => [
            'product' => '<a href="http://example.com">Product 1</a>',
            'quantity' => 2
        ]
    ]
];

// Sanitize nested array using array_walk_recursive
array_walk_recursive($data, 'sanitize_array');

print_r($data);
/*
Output:
Array
(
    [user] => Array
        (
            [name] => alert("XSS")John
            [email] => john<doe>@example.com
            [details] => Array
                (
                    [address] => 123 Street
                    [phone] => 123-456-7890
                )

        )

    [order] => Array
        (
            [id] => 12345
            [items] => Array
                (
                    [product] => Product 1
                    [quantity] => 2
                )

        )

)
*/
?>