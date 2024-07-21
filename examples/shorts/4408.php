<?php

class LazyLoader {
    private $properties = [];
    private $initialized = [];

    public function __get($name) {
        if (!array_key_exists($name, $this->initialized)) {
            $this->initialized[$name] = $this->initialize($name);
        }
        return $this->initialized[$name];
    }

    private function initialize($name) {
        // Simulating heavy resource allocation
        echo "Initializing $name...\n";
        $this->properties[$name] = "Data for $name";
        return $this->properties[$name];
    }
}

// Example usage
$loader = new LazyLoader();

// Accessing properties
echo $loader->user . "\n"; // Outputs: Initializing user... Data for user
echo $loader->settings . "\n"; // Outputs: Initializing settings... Data for settings

// Adding humor
echo $loader->pizza . "\n"; // Outputs: Initializing pizza... Data for pizza
?>