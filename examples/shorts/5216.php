<?php
// Define a custom stream wrapper class
class MyCustomStream {
    private $resource;
    
    public function stream_open($path, $mode, $options, &$opened_path) {
        // Open the resource
        $this->resource = fopen($path, $mode);
        return $this->resource !== false;
    }

    public function stream_read($count) {
        // Read from the resource
        return fread($this->resource, $count);
    }

    public function stream_write($data) {
        // Write to the resource
        return fwrite($this->resource, $data);
    }

    public function stream_close() {
        // Close the resource
        fclose($this->resource);
    }
}

// Register the custom stream wrapper
stream_register_wrapper("custom", "MyCustomStream") 
    or die("Failed to register custom protocol");

// Use the custom stream wrapper
$handle = fopen("custom://path/to/file", "r+");
if ($handle) {
    echo fread($handle, 1024);
    fclose($handle);
} else {
    echo "Failed to open stream.";
}
?>