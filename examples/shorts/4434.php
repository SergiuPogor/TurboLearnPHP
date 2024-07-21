// Example of advanced exception handling in PHP

try {
    // Attempt to perform an operation that may throw an exception
    $result = performDangerousOperation();
    
    // Process $result if operation was successful
    echo "Operation successful: " . $result;
} catch (SpecificException $e) {
    // Handle specific type of exception
    echo "Caught specific exception: " . $e->getMessage();
} catch (AnotherException $e) {
    // Handle another specific type of exception
    echo "Caught another exception: " . $e->getMessage();
} catch (Exception $e) {
    // Handle any other unexpected exceptions
    echo "Caught unexpected exception: " . $e->getMessage();
} finally {
    // Optional cleanup or finalization code
    echo "Cleanup after exception handling";
}