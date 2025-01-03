<?php
// Establish database connection
$mysqli = new mysqli('localhost', 'username', 'password', 'database');

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Function to execute a dynamic SQL query securely
function executeSecureQuery($mysqli, $userInput) {
    // Prepare the SQL statement
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");

    // Bind user input to the prepared statement
    $stmt->bind_param("s", $userInput);

    // Execute the statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    // Fetch all rows
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Close the statement
    $stmt->close();

    return $data;
}

// Example usage
$userInput = 'john_doe'; // Example user input (this could come from a form)
$users = executeSecureQuery($mysqli, $userInput);

// Output the results
foreach ($users as $user) {
    echo "User: " . htmlspecialchars($user['username']) . "<br>";
}

// Close the database connection
$mysqli->close();
?>