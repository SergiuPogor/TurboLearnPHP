<?php

class ComplexObject {
    public $data;
    
    public function __construct($data) {
        $this->data = $data;
    }

    // Deep clone to handle nested objects
    public function __clone() {
        // Ensure nested objects are also cloned
        if (is_object($this->data)) {
            $this->data = clone $this->data;
        }
    }
}

// Usage example
$original = new ComplexObject(new DateTime());
$clone = clone $original;

// Modify the clone and check if the original is affected
$clone->data->modify('+1 day');
echo "Original Date: " . $original->data->format('Y-m-d') . "<br/>";
echo "Cloned Date: " . $clone->data->format('Y-m-d') . "<br/>";
?>