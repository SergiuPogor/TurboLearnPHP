// Example demonstrating the __get magic method in PHP
class Example {
    private $data = [];

    // Magic method to intercept property access
    public function __get($name) {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            return "Property '$name' not found!";
        }
    }

    // Method to set data for demonstration
    public function setData($key, $value) {
        $this->data[$key] = $value;
    }
}

// Usage
$example = new Example();
$example->setData('name', 'John');
echo $example->name; // Accesses __get to fetch 'name' property