// Example PHP code for handling JSON parsing errors gracefully

// JSON data to decode (simulated from an external source)
$jsonData = '{ "name": "John", "age": "30", "city": "New York" }';

try {
    // Attempt to decode JSON data
    $decodedData = json_decode($jsonData);

    // Check for JSON decoding errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('JSON parsing error: ' . json_last_error_msg());
    }

    // Access decoded data
    echo 'Name: ' . $decodedData->name . '<br>';
    echo 'Age: ' . $decodedData->age . '<br>';
    echo 'City: ' . $decodedData->city . '<br>';

} catch (Exception $e) {
    // Handle JSON parsing exception
    echo 'Error: ' . $e->getMessage();
}