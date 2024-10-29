<?php
// Advanced SQL Debugging Example in PHP

try {
    $pdo = new PDO('mysql:host=localhost;dbname=testdb', 'username', 'password', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
    
    // Preparing a query with placeholders
    $query = "SELECT * FROM users WHERE email = :email AND status = :status";
    $stmt = $pdo->prepare($query);
    
    // Parameters for the query
    $email = 'user@example.com';
    $status = 'active';
    
    // Bind values with additional debugging visibility
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    
    // Capture bound parameters to reconstruct the final query for logging
    $boundQuery = $query;
    foreach ([':email' => $email, ':status' => $status] as $param => $value) {
        $boundQuery = str_replace($param, $pdo->quote($value), $boundQuery);
    }
    
    // Log the final SQL for debugging without executing
    error_log("Debugging SQL Query: $boundQuery");
    
    // Execute the query
    $stmt->execute();
    
    // Fetch results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Error handling for SQL errors
    error_log("SQL Error: " . $e->getMessage());
}
?>