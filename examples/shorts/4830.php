<?php

// Example PHP code to handle circular references in object serialization

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

// Custom serialize function to handle circular references
function custom_serialize($data) {
    $visited = [];
    
    $recursive_serializer = function ($value) use (&$recursive_serializer, &$visited) {
        if (is_object($value)) {
            $hash = spl_object_id($value);
            if (isset($visited[$hash])) {
                return "**RECURSION**"; // Placeholder for circular reference
            }
            $visited[$hash] = true;
            $value = (array)$value;
        }
        if (is_array($value)) {
            return array_map($recursive_serializer, $value);
        }
        return $value;
    };
    
    $result = serialize($recursive_serializer($data));
    
    // Humor: Avoiding endless loops with style!
    if ($result === false) {
        throw new Exception("Serialization Error: Unable to serialize object.");
    }
    
    return $result;
}

// Serialize the circular reference object
try {
    $serializedOutput = custom_serialize($node1);
    echo $serializedOutput;
} catch (Exception $e) {
    // Logging error for debugging purposes
    error_log($e->getMessage());
    echo "Failed to serialize object. Check logs for details.\n";
}

?>