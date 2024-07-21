<?php

// Example of Dependency Injection in PHP using a DI container (e.g., Symfony Container)
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

// Define a DI container
$container = new ContainerBuilder();

// Register a service
$container->register('mailer', 'MailService')
    ->addArgument(new Reference('transport'));

// Define a service for transport
$container->register('transport', 'SmtpTransport')
    ->addArgument('smtp.example.com');

// Retrieve a service from the container
$mailer = $container->get('mailer');

// Use the service
$mailer->send('recipient@example.com', 'Subject', 'Message');

// Example of lazy loading: Services are instantiated only when needed
$container->register('lazyService', 'LazyService')
    ->setLazy(true);

// Test the DI configuration
// Unit tests or integration tests to verify dependencies are correctly injected
class MailerTest extends \PHPUnit\Framework\TestCase
{
    public function testMailerService()
    {
        // Set up the container
        $container = new ContainerBuilder();
        $container->register('mailer', 'MailService')
            ->addArgument(new Reference('transport'));
        
        $container->register('transport', 'SmtpTransport')
            ->addArgument('smtp.example.com');

        // Get the mailer service from the container
        $mailer = $container->get('mailer');

        // Assert statements to verify functionality
        $this->assertInstanceOf('MailService', $mailer);
    }
}

// Avoid overcomplicating DI configurations; keep them simple and focused
// DI should enhance code readability and maintainability, not add complexity

?>