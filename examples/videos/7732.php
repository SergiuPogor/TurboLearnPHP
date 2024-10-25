<?php

// Example showing the differences between cURL and file_get_contents in PHP

// URL for testing
$url = 'https://jsonplaceholder.typicode.com/posts';

// Using file_get_contents to make a simple GET request
$responseFileGetContents = file_get_contents($url);
if ($responseFileGetContents === false) {
    echo "Error fetching data using file_get_contents." . PHP_EOL;
} else {
    echo "Response using file_get_contents:" . PHP_EOL;
    echo $responseFileGetContents . PHP_EOL;
}

// Using cURL for a more complex GET request
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

// Setting custom headers (if needed)
$headers = [
    'Accept: application/json',
    'User-Agent: PHP-CURL-Example'
];
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Execute the cURL request
$responseCurl = curl_exec($curl);

// Check for errors
if (curl_errno($curl)) {
    echo "Error fetching data using cURL: " . curl_error($curl) . PHP_EOL;
} else {
    echo "Response using cURL:" . PHP_EOL;
    echo $responseCurl . PHP_EOL;
}

// Closing the cURL session
curl_close($curl);

// Example of handling POST requests with cURL
$postData = [
    'title' => 'foo',
    'body' => 'bar',
    'userId' => 1
];

$curlPost = curl_init('https://jsonplaceholder.typicode.com/posts');
curl_setopt($curlPost, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlPost, CURLOPT_POST, true);
curl_setopt($curlPost, CURLOPT_POSTFIELDS, http_build_query($postData));

// Execute the POST request
$responseCurlPost = curl_exec($curlPost);

// Check for errors
if (curl_errno($curlPost)) {
    echo "Error posting data using cURL: " . curl_error($curlPost) . PHP_EOL;
} else {
    echo "Response from POST request using cURL:" . PHP_EOL;
    echo $responseCurlPost . PHP_EOL;
}

// Closing the cURL session
curl_close($curlPost);

?>