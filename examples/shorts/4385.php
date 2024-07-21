// Example PHP code demonstrating dependency injection

// Service interface
interface ServiceInterface {
    public function doSomething();
}

// Concrete service implementation
class ConcreteService implements ServiceInterface {
    public function doSomething() {
        return "Doing something useful!";
    }
}

// Consumer class with dependency injection
class Consumer {
    private $service;

    // Constructor injection
    public function __construct(ServiceInterface $service) {
        $this->service = $service;
    }

    // Method using injected service
    public function useService() {
        return $this->service->doSomething();
    }
}

// Creating instances with dependency injection
$service = new ConcreteService(); // Typically resolved via DI container
$consumer = new Consumer($service);

// Using the consumer
echo $consumer->useService(); // Output: Doing something useful!