<?php
// JSON Schema validation example
$data = json_decode('{"name":"John", "age":25}');

// JSON schema for validation (using a library like 'justinrainbow/json-schema')
$schema = json_decode('{
    "type": "object",
    "properties": {
        "name": {"type": "string"},
        "age": {"type": "integer"}
    },
    "required": ["name", "age"]
}');

// Use a validator library to validate the data against the schema
$validator = new JsonSchema\Validator();
$validator->validate($data, $schema);
if ($validator->isValid()) {
    echo "JSON is valid.";
} else {
    echo "JSON is not valid.";
}

// PHP built-in validation example
$name = "John";
$age = 25;

if (is_string($name) && is_int($age)) {
    echo "Valid data.";
} else {
    echo "Invalid data.";
}
?>