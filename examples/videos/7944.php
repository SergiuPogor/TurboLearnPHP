<?php

// Simple RESTful API example using raw PHP

// Set headers for JSON response
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Database connection (example with PDO)
$dsn = 'mysql:host=localhost;dbname=testdb';
$user = 'root';
$password = '';
$pdo = new PDO($dsn, $user, $password);

// Get the HTTP method
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Handle different HTTP methods
switch ($requestMethod) {
    case 'GET':
        // Handle GET request
        $stmt = $pdo->query("SELECT * FROM items");
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($items);
        break;
    
    case 'POST':
        // Handle POST request
        $input = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare("INSERT INTO items (name, value) VALUES (:name, :value)");
        $stmt->execute(['name' => $input['name'], 'value' => $input['value']]);
        echo json_encode(['status' => 'Item created']);
        break;

    case 'PUT':
        // Handle PUT request
        $input = json_decode(file_get_contents('php://input'), true);
        $stmt = $pdo->prepare("UPDATE items SET value = :value WHERE id = :id");
        $stmt->execute(['value' => $input['value'], 'id' => $input['id']]);
        echo json_encode(['status' => 'Item updated']);
        break;

    case 'DELETE':
        // Handle DELETE request
        $id = $_GET['id'];
        $stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");
        $stmt->execute(['id' => $id]);
        echo json_encode(['status' => 'Item deleted']);
        break;

    default:
        // Handle unsupported HTTP methods
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>