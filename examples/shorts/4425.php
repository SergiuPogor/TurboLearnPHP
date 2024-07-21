// Example of using PHP closures
$names = ['Alice', 'Bob', 'Charlie'];

// Using array_map with a closure to transform names
$transformedNames = array_map(function($name) {
    return strtoupper($name);
}, $names);

// Output transformed names
print_r($transformedNames);