// Example PHP code for fetching and processing online cosmological data
use GuzzleHttp\Client;

// Function to fetch cosmological data from an API
function fetchCosmologicalData($apiEndpoint) {
    $client = new Client();
    $response = $client->get($apiEndpoint);
    
    if ($response->getStatusCode() == 200) {
        $data = json_decode($response->getBody(), true);
        return $data;
    } else {
        return null;
    }
}

// Example usage
$apiEndpoint = 'https://api.nasa.gov/planetary/apod?api_key=YOUR_API_KEY';
$cosmologicalData = fetchCosmologicalData($apiEndpoint);

// Process and display the fetched data
if ($cosmologicalData) {
    echo "Title: " . $cosmologicalData['title'] . "\n";
    echo "Explanation: " . $cosmologicalData['explanation'] . "\n";
    echo "Date: " . $cosmologicalData['date'] . "\n";
    // Additional processing as needed
} else {
    echo "Failed to fetch cosmological data.\n";
}