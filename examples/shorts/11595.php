<?php
// Example 1: Using mysql_query (deprecated, should not be used)
$connection = mysql_connect('localhost', 'root', '');
mysql_select_db('example_db', $connection);
$query = "SELECT * FROM users";
$result = mysql_query($query, $connection);

// Example 2: Using mysqli_query (recommended)
$connection = mysqli_connect('localhost', 'root', '', 'example_db');
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);

// Example 3: Using mysqli_query with prepared statements (more secure)
$stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Close the connections
mysqli_close($connection);
?>