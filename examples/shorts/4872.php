<?php

class FluentExample {
    private int $value;

    public function __construct(int $initialValue) {
        $this->value = $initialValue;
    }

    public function add(int $number): self {
        $this->value += $number;
        return $this; // Important: Return $this for chaining
    }

    public function multiply(int $factor): self {
        $this->value *= $factor;
        return $this; // Important: Return $this for chaining
    }

    public function getValue(): int {
        return $this->value;
    }
}

// Usage of method chaining
$instance = new FluentExample(5);
$result = $instance->add(10)->multiply(2)->getValue();

echo $result; // Output should be 30

?>