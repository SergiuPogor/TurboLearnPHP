// Example PHP code demonstrating the use of reflection for dynamic code analysis

// Define a sample class
class MyClass {
    private $privateProperty = 'secret';

    public function myMethod($param) {
        return "Hello $param!";
    }
}

// Create a reflection class instance
$reflectionClass = new ReflectionClass('MyClass');

// Get class name
$className = $reflectionClass->getName();
echo "Class name: $className\n";

// Get class methods
$methods = $reflectionClass->getMethods();
echo "Methods:\n";
foreach ($methods as $method) {
    echo "- " . $method->getName() . "\n";
}

// Access private property using reflection
$privateProperty = $reflectionClass->getProperty('privateProperty');
$privateProperty->setAccessible(true); // Allow access to private property
$value = $privateProperty->getValue(new MyClass());
echo "Private property value: $value\n";

// Invoke a method dynamically
$instance = $reflectionClass->newInstance();
$method = $reflectionClass->getMethod('myMethod');
$result = $method->invoke($instance, 'World');
echo "Method invocation result: $result\n";