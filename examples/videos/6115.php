<?php

// Example 1: Update query with mysqli_affected_rows to check affected rows
$mysqli = new mysqli("localhost", "user", "password", "database");

// Assume the connection is successful
if ($mysqli->connect_errno) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Update a user's email address and check how many rows were updated
$mysqli->query("UPDATE users SET email = 'newemail@example.com' WHERE user_id = 42");
$affectedRows = $mysqli->affected_rows;

file_put_contents('/tmp/test/updated_rows.txt', "Rows updated: " . $affectedRows);

// Example 2: Delete query and handle affected rows for error handling
$mysqli->query("DELETE FROM sessions WHERE last_activity < NOW() - INTERVAL 30 DAY");
$deletedRows = $mysqli->affected_rows;

if ($deletedRows > 0) {
    file_put_contents('/tmp/test/deleted_rows.txt', "Deleted $deletedRows expired sessions.");
} else {
    file_put_contents('/tmp/test/deleted_rows.txt', "No expired sessions to delete.");
}

// Example 3: Using mysqli_affected_rows after an INSERT statement
$mysqli->query("INSERT INTO orders (user_id, product_id, order_date) VALUES (3, 27, NOW())");
$insertedRows = $mysqli->affected_rows;

file_put_contents('/tmp/test/inserted_rows.txt', "New orders added: " . $insertedRows);

// Example 4: Using prepared statements and checking affected rows
$stmt = $mysqli->prepare("UPDATE products SET price = price * 1.1 WHERE category = ?");
$category = 'electronics';
$stmt->bind_param('s', $category);

$stmt->execute();
$affectedRowsPrepared = $stmt->affected_rows;

file_put_contents('/tmp/test/affected_prepared_rows.txt', "Rows affected by prepared statement: " . $affectedRowsPrepared);

// Example 5: Handle large updates and track affected rows in a loop
for ($i = 1; $i <= 5; $i++) {
    $mysqli->query("UPDATE inventory SET stock = stock - 10 WHERE product_id = $i");
    $rowsAffectedInLoop = $mysqli->affected_rows;
    
    file_put_contents("/tmp/test/affected_in_loop_product_$i.txt", "Product $i stock updated. Rows affected: " . $rowsAffectedInLoop);
}

// Example 6: Trigger an error if no rows are affected after an important query
$mysqli->query("UPDATE users SET status = 'active' WHERE user_id = 99");
if ($mysqli->affected_rows == 0) {
    file_put_contents('/tmp/test/error.txt', "No rows updated. This could be a logic error.");
}

// Close the connection at the end
$mysqli->close();

?>