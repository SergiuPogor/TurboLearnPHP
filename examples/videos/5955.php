<?php

// Start the session
session_start();

// Sample data to be stored in session
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'john_doe';
$_SESSION['cart'] = ['item1', 'item2', 'item3'];

// Encode the session data into a string
$encodedSession = session_encode();

// Output the encoded session string
echo "Encoded Session Data: " . $encodedSession;

// Example of storing the encoded session string into a database
function storeSessionInDatabase($encodedSession) {
    // Assuming you have a PDO connection $pdo
    global $pdo; // use your existing PDO connection

    $stmt = $pdo->prepare("INSERT INTO sessions (session_data) VALUES (:data)");
    $stmt->bindParam(':data', $encodedSession);
    $stmt->execute();
}

// Call the function to store the encoded session
storeSessionInDatabase($encodedSession);

// Example of retrieving and decoding the session data from the database
function retrieveSessionFromDatabase($sessionId) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT session_data FROM sessions WHERE id = :id");
    $stmt->bindParam(':id', $sessionId);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        // Decode the session string back into an array
        session_decode($result['session_data']);
    }
}

// Example usage of retrieving session data
retrieveSessionFromDatabase(1); // Assuming session ID is 1

// Access the session data after decoding
echo "User ID: " . $_SESSION['user_id'];
echo "Username: " . $_SESSION['username'];
?>