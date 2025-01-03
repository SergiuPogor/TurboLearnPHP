<?php
// Example: Fetching MySQL data as objects using mysqli_fetch_object()

// Database connection details
$mysqli = new mysqli("localhost", "username", "password", "test_db");

// Check for a successful connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Sample query to fetch users
$query = "SELECT id, name, email FROM users";
$result = $mysqli->query($query);

// Fetch results as objects and process them
while ($user = $result->fetch_object()) {
    // Accessing object properties directly
    echo "User ID: " . $user->id . PHP_EOL;
    echo "Name: " . $user->name . PHP_EOL;
    echo "Email: " . $user->email . PHP_EOL;

    // Now let's assume we want to fetch additional data
    // directly in object form but map it to a different class
    class CustomUser {
        public $userID;
        public $userName;
        public $userEmail;
    }

    // Use the fetch_object() with the optional class name parameter
    $customUser = $result->fetch_object('CustomUser');

    // Mapping object properties to CustomUser class
    if ($customUser) {
        $customUser->userID = $user->id;
        $customUser->userName = $user->name;
        $customUser->userEmail = $user->email;

        // Accessing custom mapped properties
        echo "Custom User ID: " . $customUser->userID . PHP_EOL;
        echo "Custom Name: " . $customUser->userName . PHP_EOL;
        echo "Custom Email: " . $customUser->userEmail . PHP_EOL;
    }

    // Handle error in case fetching fails
    if (!$customUser) {
        echo "Error: Failed to fetch user object." . PHP_EOL;
    }
}

// Free the result set
$result->free();

// Close the connection
$mysqli->close();

// Another example: Using fetch_object in conjunction with prepared statements
$stmt = $mysqli->prepare("SELECT id, name FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$userId = 1;
$stmt->execute();

// Fetch result as object
$result = $stmt->get_result();
$userObject = $result->fetch_object();

// Ensure valid data is returned
if ($userObject) {
    echo "Prepared Statement User ID: " . $userObject->id . PHP_EOL;
    echo "Prepared Statement Name: " . $userObject->name . PHP_EOL;
} else {
    echo "No user found for this ID.";
}

$stmt->close();
?>