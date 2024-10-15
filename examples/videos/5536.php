<?php

// Example 1: Extract Thumbnail from JPEG Image Using exif_thumbnail()

// Path to the image file
$imagePath = '/tmp/test/input.jpg';

// Check if the file exists
if (!file_exists($imagePath)) {
    throw new Exception("Image file not found: $imagePath");
}

// Attempt to extract the embedded thumbnail using exif_thumbnail()
$thumbnail = exif_thumbnail($imagePath, $width, $height, $type);

if ($thumbnail !== false) {
    // Output image info
    echo "Thumbnail extracted successfully! Width: $width, Height: $height, Type: $type";
    
    // Save the thumbnail as a separate file
    $thumbnailFilePath = '/tmp/test/thumbnail.jpg';
    file_put_contents($thumbnailFilePath, $thumbnail);

    echo "Thumbnail saved at: $thumbnailFilePath";
} else {
    echo "No embedded thumbnail found in the image.";
}


// Example 2: Handling Multiple Images in a Directory for Thumbnail Extraction

$directory = '/tmp/test/images/';
$files = scandir($directory);

foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'jpg') {
        $imagePath = $directory . $file;

        // Attempt to extract the embedded thumbnail
        $thumbnail = exif_thumbnail($imagePath, $width, $height, $type);

        if ($thumbnail !== false) {
            $thumbnailPath = $directory . 'thumbnails/' . pathinfo($file, PATHINFO_FILENAME) . '_thumb.jpg';
            file_put_contents($thumbnailPath, $thumbnail);

            echo "Thumbnail extracted for $file and saved at $thumbnailPath.\n";
        } else {
            echo "No thumbnail available for $file.\n";
        }
    }
}


// Example 3: Generating Thumbnail Only When EXIF Data Exists

function getThumbnailFromImage($imagePath) {
    // Ensure the file exists
    if (!file_exists($imagePath)) {
        throw new Exception("File not found: $imagePath");
    }

    // Extract EXIF thumbnail, if available
    $thumbnail = exif_thumbnail($imagePath, $width, $height, $type);

    if ($thumbnail !== false) {
        return [
            'thumbnail' => $thumbnail,
            'width' => $width,
            'height' => $height,
            'type' => $type
        ];
    }

    return null; // No thumbnail found
}

// Example of use
$imageFile = '/tmp/test/input.jpg';
$thumbnailData = getThumbnailFromImage($imageFile);

if ($thumbnailData) {
    echo "Thumbnail data retrieved: Width {$thumbnailData['width']}, Height {$thumbnailData['height']}.";
    file_put_contents('/tmp/test/saved_thumb.jpg', $thumbnailData['thumbnail']);
} else {
    echo "No thumbnail found in the image.";
}

?>
