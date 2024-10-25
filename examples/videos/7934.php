<?php
// Sample REST API in PHP using HTTP methods

// Mock data for demonstration
$data = [
    1 => ['id' => 1, 'name' => 'Item One'],
    2 => ['id' => 2, 'name' => 'Item Two']
];

// Handle the incoming request
$requestMethod = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Switch based on the HTTP method
switch ($requestMethod) {
    case 'GET':
        if ($id) {
            // Return a specific resource
            echo json_encode($data[$id] ?? null);
        } else {
            // Return all resources
            echo json_encode($data);
        }
        break;

    case 'POST':
        // Create a new resource
        $input = json_decode(file_get_contents('php://input'), true);
        $newId = max(array_keys($data)) + 1;
        $data[$newId] = ['id' => $newId, 'name' => $input['name']];
        echo json_encode($data[$newId]);
        break;

    case 'PUT':
        // Update an existing resource
        if ($id && isset($data[$id])) {
            $input = json_decode(file_get_contents('php://input'), true);
            $data[$id]['name'] = $input['name'];
            echo json_encode($data[$id]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Resource not found']);
        }
        break;

    case 'DELETE':
        // Delete a resource
        if ($id && isset($data[$id])) {
            unset($data[$id]);
            echo json_encode(['message' => 'Resource deleted']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Resource not found']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
}