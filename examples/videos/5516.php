<?php

// Function to display all EXIF tag names in an image
function displayExifTagNames($imagePath) {
    // Check if the file exists
    if (!file_exists($imagePath)) {
        die("File does not exist.");
    }

    // Get the EXIF data from the image
    $exifData = exif_read_data($imagePath);

    // Check if EXIF data was retrieved
    if ($exifData === false) {
        die("No EXIF data found.");
    }

    // Loop through all EXIF tags and display their names
    foreach ($exifData as $key => $value) {
        // Get the tag name using exif_tagname()
        $tagName = exif_tagname($key);
        echo "Tag: $key ($tagName) - Value: $value" . PHP_EOL;
    }
}

// Define the path to your image file
$imagePath = '/tmp/test/input.jpg';

// Display EXIF tag names and their values
displayExifTagNames($imagePath);

?>