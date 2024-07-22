// Example demonstrating PHP closures for managing scoped variables
function createMultiplier($factor) {
    return function ($number) use ($factor) {
        return $number * $factor;
    };
}

// Usage example
$double = createMultiplier(2);
echo $double(5); // Output: 10