// Example PHP code demonstrating efficient array initialization

// Initialize an empty array using [] shorthand
$emptyArray = [];

// Initialize an array with values using [] shorthand
$valuesArray = ['apple', 'banana', 'cherry'];

// Initializing associative arrays
$assocArray = [
    'name' => 'John',
    'age' => 30,
    'city' => 'New York'
];

// Dynamic array initialization
$dynamicArray = [];
$dynamicArray[] = 'value1';
$dynamicArray[] = 'value2';

// Avoid unnecessary array() calls
$redundantArray = array(); // Less efficient than []

// Output examples
var_dump($emptyArray);
var_dump($valuesArray);
var_dump($assocArray);
var_dump($dynamicArray);