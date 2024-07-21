// Example usage of array_column to extract names from a list of users
$users = [
    ['id' => 1, 'name' => 'Alice', 'age' => 28],
    ['id' => 2, 'name' => 'Bob', 'age' => 35],
    ['id' => 3, 'name' => 'Charlie', 'age' => 42]
];

$names = array_column($users, 'name');

print_r($names); // Outputs: Array ( [0] => Alice [1] => Bob [2] => Charlie )