<?php

// Step 1: Establish a connection to the MySQL database
$host = "localhost";
$username = "my_user";
$password = "my_password";
$dbname = "my_database";

$mysqli = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Step 2: Start a transaction
$mysqli->begin_transaction();

try {
    // Step 3: Prepare and execute the first SQL statement
    $stmt1 = $mysqli->prepare("INSERT INTO my_table (column_name) VALUES (?)");
    $value1 = "First Entry";
    $stmt1->bind_param("s", $value1);
    $stmt1->execute();

    // Step 4: Prepare and execute the second SQL statement
    $stmt2 = $mysqli->prepare("UPDATE another_table SET column_name = ? WHERE id = ?");
    $value2 = "Updated Value";
    $idToUpdate = 1;
    $stmt2->bind_param("si", $value2, $idToUpdate);
    $stmt2->execute();

    // Simulate an error for demonstration purposes
    if ($stmt2->affected_rows === 0) {
        throw new Exception("No rows were updated. Simulated error.");
    }

    // Step 5: Commit the transaction if all statements are successful
    $mysqli->commit();
    echo "Transaction completed successfully!\n";

} catch (Exception $e) {
    // Step 6: Rollback the transaction on error
    $mysqli->rollback();
    echo "Transaction rolled back: " . $e->getMessage() . "\n";
}

// Step 7: Close the statement and connection
$stmt1->close();
$stmt2->close();
$mysqli->close();

?>