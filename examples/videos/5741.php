<?php

// Example: Using mysqli_stmt_send_long_data() to handle large data in PHP

// Step 1: Connect to the MySQL database
$conn = new mysqli("localhost", "myuser", "mypassword", "mydb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Prepare an INSERT statement with a blob
$stmt = $conn->prepare("INSERT INTO my_table (data) VALUES (?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

// Step 3: Bind parameters
$stmt->bind_param("b", $data);

// Step 4: Read the large file into a variable
$filePath = '/tmp/test/input.zip'; // Path to the large file
$handle = fopen($filePath, 'rb');
if (!$handle) {
    die("Failed to open file.");
}

// Step 5: Send long data in chunks
while (!feof($handle)) {
    // Read 1 MB at a time
    $data = fread($handle, 1024 * 1024);
    if ($data === false) {
        die("Failed to read file.");
    }
    // Send the chunk to the database
    if (!$stmt->send_long_data(0, $data)) {
        die("Failed to send long data: " . $stmt->error);
    }
}

// Step 6: Close the file
fclose($handle);

// Step 7: Execute the statement
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

// Step 8: Clean up
$stmt->close();
$conn->close();

// Step 9: Output success message
echo "Large data sent successfully!";

// --- Additional Tip: Handling multiple files ---

// Step 10: You can repeat the process for multiple files if needed
$additionalFiles = ['/tmp/test/input.txt', '/tmp/test/input2.zip'];
foreach ($additionalFiles as $additionalFile) {
    $handle = fopen($additionalFile, 'rb');
    if (!$handle) {
        die("Failed to open file: $additionalFile.");
    }
    while (!feof($handle)) {
        $data = fread($handle, 1024 * 1024);
        if ($data === false) {
            die("Failed to read file: $additionalFile.");
        }
        if (!$stmt->send_long_data(0, $data)) {
            die("Failed to send long data: " . $stmt->error);
        }
    }
    fclose($handle);
}

// Step 11: Don't forget to execute the statement after sending all long data!
if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

// Step 12: Final cleanup
$stmt->close();
$conn->close();
?>