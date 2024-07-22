<?php

// Example PHP code to handle circular references in JSON encoding

class Node {
    public $value;
    public $next;
    
    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

// Create nodes with circular reference
$node1 = new Node("Node 1");
$node2 = new Node("Node 2");
$node1->next = $node2;
$node2->next = $node1; // Circular reference here

// Custom JSON encode function to handle circular references
function custom_json_encode($data) {
    $visited = [];
    
    $recursive_encoder = function ($value) use (&$recursive_encoder, &$visited) {
        if (is_object($value)) {
            if (in_array($value, $visited, true)) {
                return "**RECURSION**"; // Placeholder for circular reference
            }
            $visited[] = $value;
            $value = (array)$value;
        }
        if (is_array($value)) {
            return array_map($recursive_encoder, $value);
        }
        return $value;
    };
    
    $result = json_encode($recursive_encoder($data), JSON_PRETTY_PRINT);
    
    // Humor: No infinite loops allowed!
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON Encode Error: " . json_last_error_msg());
    }
    
    return $result;
}

// Encode the circular reference object
try {
    $jsonOutput = custom_json_encode($node1);
    echo $jsonOutput;
} catch (Exception $e) {
    // Logging error for debugging purposes
    error_log($e->getMessage());
    echo "Failed to encode JSON. Please check logs for more details.\n";
}

?>