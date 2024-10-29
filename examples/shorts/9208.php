<?php
// Example of using cURL for a REST API call in PHP

function callApi(string $method, string $url, array $data = []): array {
    $curl = curl_init();

    switch ($method) {
        case 'GET':
            // Set the URL for GET request
            curl_setopt($curl, CURLOPT_URL, $url);
            break;
        case 'POST':
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            break;
        case 'PUT':
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            break;
        case 'DELETE':
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
        default:
            throw new Exception("Invalid HTTP method");
    }

    // Return the response as a string
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        throw new Exception('cURL error: ' . curl_error($curl));
    }

    // Close the cURL session
    curl_close($curl);

    // Decode and return the response
    return json_decode($response, true);
}

// Example usage
try {
    $response = callApi('GET', 'https://api.example.com/data');
    print_r($response); // Output the response
} catch (Exception $e) {
    echo "API call failed: " . $e->getMessage();
}
?>