// Example usage of array_chunk to split an array into chunks
$array = range(1, 100); // Array of numbers from 1 to 100

$chunked_array = array_chunk($array, 10); // Split into chunks of 10

foreach ($chunked_array as $index => $chunk) {
    echo "Chunk " . ($index + 1) . ": ";
    print_r($chunk);
}