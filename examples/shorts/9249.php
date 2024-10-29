<?php
// Sample MVC structure for a simple PHP application

// Simple Router class
class Router {
    private array $routes = [];

    public function addRoute(string $method, string $path, callable $handler) {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function resolve(string $method, string $path) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                return call_user_func($route['handler']);
            }
        }
        return $this->handleNotFound();
    }

    private function handleNotFound() {
        return "404 Not Found";
    }
}

// Controller for handling user-related actions
class UserController {
    public function list() {
        return "List of users";
    }

    public function show($id) {
        return "User profile for user with ID: $id";
    }
}

// Instantiate router and controller
$router = new Router();
$userController = new UserController();

// Define routes
$router->addRoute('GET', '/users', [$userController, 'list']);
$router->addRoute('GET', '/users/1', function() use ($userController) {
    return $userController->show(1);
});

// Simulate a request to the router
$requestMethod = 'GET'; // This would come from the HTTP request
$requestPath = '/users'; // This would also come from the HTTP request
$response = $router->resolve($requestMethod, $requestPath);

// Output the response
echo $response;