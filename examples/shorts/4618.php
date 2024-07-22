<?php

// Example: Handling Large File Uploads in PHP

// Function to handle file upload
function handleFileUpload($uploadedFile) {
    $targetDir = "/path/to/uploads/"; // Set your upload directory
    $targetFile = $targetDir . basename($uploadedFile["name"]);
    $uploadOk = true;

    // Check file size
    if ($uploadedFile["size"] > 5000000) { // Example limit: 5MB
        $uploadOk = false;
    }

    // Allow only certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedTypes)) {
        $uploadOk = false;
    }

    // Check if $uploadOk is set to false by an error
    if ($uploadOk === false) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the uploaded file using move_uploaded_file function
        if (move_uploaded_file($uploadedFile["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($uploadedFile["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Example usage: handle file upload from HTML form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploadedFile"])) {
    handleFileUpload($_FILES["uploadedFile"]);
}

?>

<!-- Example HTML form for file upload -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="uploadedFile" id="uploadedFile">
    <input type="submit" value="Upload File" name="submit">
</form>