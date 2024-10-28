<?php

// File: /tmp/test/AsyncHttpRequest.php

use Swoole\Coroutine\HTTP\Client;
use Swoole\Coroutine;

require '/path/to/vendor/autoload.php'; // Assuming you installed swoole via Composer

class AsyncHttpRequest
{
    private array $urls = [
        'https://api.example.com/data1',
        'https://api.example.com/data2',
        'https://api.example.com/data3',
    ];

    public function fetchUrls(): void
    {
        // Create an array to hold clients
        $clients = [];

        // Launch a coroutine for each URL
        foreach ($this->urls as $url) {
            Coroutine::create(function () use ($url, &$clients) {
                $parsedUrl = parse_url($url);
                $client = new Client($parsedUrl['host'], 443, true); // true for SSL
                $client->set(['timeout' => 3.0]);

                $client->get($parsedUrl['path']);
                $clients[] = [
                    'url' => $url,
                    'status' => $client->statusCode,
                    'body' => $client->body
                ];

                $client->close();
            });
        }

        // Wait for coroutines to finish
        Coroutine::defer(function () use ($clients) {
            foreach ($clients as $clientData) {
                echo "Fetched " . $clientData['url'] . " with status " . $clientData['status'] . "\n";
                // Process each response body here as needed
            }
        });
    }
}

// Usage example

Swoole\Coroutine\run(function () {
    $request = new AsyncHttpRequest();
    $request->fetchUrls();
});
?>