<?php

// Setup multiple MySQL connections with mysqli_real_connect()
// Initialize mysqli object for advanced configuration
$mysqli1 = new mysqli();
$mysqli2 = new mysqli();

// Define connection parameters for first database
$host1 = 'localhost';
$user1 = 'admin';
$password1 = 'securePass123!';
$db1 = 'shop_db';
$port1 = 3306; // Default MySQL port
$socket1 = null; // Can be left as null if not using socket

// Define connection parameters for second database (with a different port)
$host2 = 'localhost';
$user2 = 'admin';
$password2 = 'securePass123!';
$db2 = 'inventory_db';
$port2 = 3307; // A custom port for another MySQL instance
$socket2 = null;

// First connection with default port
if (!$mysqli1->real_connect($host1, $user1, $password1, $db1, $port1, $socket1)) {
    die('Connection to Shop DB failed: (' . $mysqli1->connect_errno . ') ' . $mysqli1->connect_error);
}

// Second connection with a different port
if (!$mysqli2->real_connect($host2, $user2, $password2, $db2, $port2, $socket2)) {
    die('Connection to Inventory DB failed: (' . $mysqli2->connect_errno . ') ' . $mysqli2->connect_error);
}

// Example 1: Working with two connections
// Fetching data from the first database
$result1 = $mysqli1->query('SELECT * FROM products WHERE in_stock = 1');
while ($row = $result1->fetch_assoc()) {
    // Handle each product data from the 'shop_db'
    echo "Product: {$row['name']}, Price: {$row['price']}\n";
}

// Fetching data from the second database
$result2 = $mysqli2->query('SELECT * FROM stock_levels WHERE quantity < 10');
while ($row = $result2->fetch_assoc()) {
    // Handle stock level data from the 'inventory_db'
    echo "Item: {$row['item_id']}, Quantity: {$row['quantity']}\n";
}

// Example 2: Secure SSL connection to the database
$mysqli3 = new mysqli();
$host3 = 'dbserver.example.com';
$user3 = 'ssl_user';
$password3 = 'sslSecurePass!';
$db3 = 'secure_data';
$port3 = 3306;
$socket3 = null;

// Enable SSL encryption (specify SSL certificates if needed)
$mysqli3->ssl_set('/path/to/client-key.pem', '/path/to/client-cert.pem', '/path/to/ca-cert.pem', null, null);

if (!$mysqli3->real_connect($host3, $user3, $password3, $db3, $port3, $socket3)) {
    die('Secure SSL Connection failed: (' . $mysqli3->connect_errno . ') ' . $mysqli3->connect_error);
}

// Secure queries on the SSL-enabled connection
$result3 = $mysqli3->query('SELECT * FROM sensitive_data');
while ($row = $result3->fetch_assoc()) {
    // Process sensitive data from the secure connection
    echo "Record ID: {$row['id']}, Secret Info: {$row['info']}\n";
}

// Closing all connections
$mysqli1->close();
$mysqli2->close();
$mysqli3->close();

?>