<?php
// PHP 8.3 Symfony Service Not Found Error Fix - Advanced Solution

namespace App\Service;

use Psr\Log\LoggerInterface;

class MyService
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logMessage(string $message): void
    {
        $this->logger->info($message);
    }
}

// services.yaml configuration
// Ensure Symfony can autowire and locate the service

services:
    App\Service\MyService:
        arguments:
            $logger: '@logger'
        tags: ['my.custom.tag']

// Controller using the service
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MyService;

class MyController
{
    private MyService $myService;

    public function __construct(MyService $myService)
    {
        $this->myService = $myService;
    }

    /**
     * @Route("/log-message", name="log_message")
     */
    public function logAction(): Response
    {
        $this->myService->logMessage('Hello from MyController!');
        return new Response('Logged the message successfully!');
    }
}

// Adding some humor to ensure the service works perfectly
$kernel = new \App\Kernel('dev', true);
$request = \Symfony\Component\HttpFoundation\Request::create('/log-message');
$response = $kernel->handle($request);
echo $response->getContent(); // Should output: Logged the message successfully!
?>