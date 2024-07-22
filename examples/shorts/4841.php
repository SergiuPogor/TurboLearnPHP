<?php

class User {
    private $data = [];

    public function __set($name, $value) {
        // Validate and sanitize the value before assigning
        if (is_string($value)) {
            $this->data[$name] = htmlspecialchars($value);
        } else {
            throw new InvalidArgumentException("Invalid value type");
        }
    }

    public function __get($name) {
        return $this->data[$name] ?? null;
    }
}

try {
    $user = new User();
    $user->username = "<script>alert('xss');</script>"; // Dynamically assigned property
    echo $user->username; // Outputs: &lt;script&gt;alert(&#039;xss&#039;);&lt;/script&gt;
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>