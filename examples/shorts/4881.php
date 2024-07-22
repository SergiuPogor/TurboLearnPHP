<?php
// Example PHP code demonstrating the use of array_map for complex data transformation

// Sample data representing a list of products with various attributes
$products = [
    [
        'id' => 101,
        'name' => 'Laptop',
        'price' => 799.99,
        'quantity' => 5
    ],
    [
        'id' => 102,
        'name' => 'Smartphone',
        'price' => 599.99,
        'quantity' => 10
    ],
    [
        'id' => 103,
        'name' => 'Tablet',
        'price' => 399.99,
        'quantity' => 7
    ],
    [
        'id' => 104,
        'name' => 'Monitor',
        'price' => 199.99,
        'quantity' => 8
    ]
];

// Callback function to format product information
$formatProduct = function($product) {
    return [
        'product_id' => $product['id'],
        'product_name' => strtoupper($product['name']),
        'total_value' => $product['price'] * $product['quantity']
    ];
};

// Using array_map to apply the callback function to each product
$formattedProducts = array_map($formatProduct, $products);

print_r($formattedProducts);
/*
Output:
Array
(
    [0] => Array
        (
            [product_id] => 101
            [product_name] => LAPTOP
            [total_value] => 3999.95
        )

    [1] => Array
        (
            [product_id] => 102
            [product_name] => SMARTPHONE
            [total_value] => 5999.90
        )

    [2] => Array
        (
            [product_id] => 103
            [product_name] => TABLET
            [total_value] => 2799.93
        )

    [3] => Array
        (
            [product_id] => 104
            [product_name] => MONITOR
            [total_value] => 1599.92
        )
)
*/
?>