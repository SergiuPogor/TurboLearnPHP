<?php

// Path to the image file
$imagePath = '/tmp/test/sample.jpg';

// Check if the file exists
if (!file_exists($imagePath)) {
    die('File not found: ' . $imagePath);
}

// Attempt to read EXIF data from the image
$exifData = @exif_read_data($imagePath);

if ($exifData === false) {
    die('Unable to read EXIF data from the file.');
}

// Display some EXIF data
echo "Image Date: " . ($exifData['DateTime'] ?? 'Not available') . "\n";
echo "Camera Model: " . ($exifData['Model'] ?? 'Not available') . "\n";
echo "Exposure Time: " . ($exifData['ExposureTime'] ?? 'Not available') . "\n";
echo "ISO Speed Ratings: " . ($exifData['ISOSpeedRatings'] ?? 'Not available') . "\n";
echo "GPS Latitude: " . ($exifData['GPSLatitude'] ?? 'Not available') . "\n";
echo "GPS Longitude: " . ($exifData['GPSLongitude'] ?? 'Not available') . "\n";

// Example 1: Handling different formats and missing data
$requiredKeys = ['DateTime', 'Model', 'ExposureTime'];
foreach ($requiredKeys as $key) {
    if (!isset($exifData[$key])) {
        echo "Warning: '$key' not found in EXIF data.\n";
    }
}

// Example 2: Extract and format GPS data if available
if (isset($exifData['GPSLatitude']) && isset($exifData['GPSLongitude'])) {
    $latitude = $exifData['GPSLatitude'];
    $longitude = $exifData['GPSLongitude'];
    // Convert from degrees, minutes, seconds to decimal
    $latitudeDecimal = $latitude[0] + $latitude[1] / 60 + $latitude[2] / 3600;
    $longitudeDecimal = $longitude[0] + $longitude[1] / 60 + $longitude[2] / 3600;
    echo "GPS Coordinates: Latitude $latitudeDecimal, Longitude $longitudeDecimal\n";
}

// Example 3: Handling images with no EXIF data
if (empty($exifData)) {
    echo "No EXIF data available for this image.\n";
}

// Example 4: Reading from a ZIP file (e.g., image within ZIP)
$zip = new ZipArchive();
$zipPath = '/tmp/test/sample.zip';

if ($zip->open($zipPath) === true) {
    $imageIndex = $zip->locateName('sample.jpg');
    if ($imageIndex !== false) {
        $zip->extractTo('/tmp/test', 'sample.jpg');
        $zip->close();
        // Read EXIF data from extracted image
        $exifDataFromZip = @exif_read_data('/tmp/test/sample.jpg');
        echo "EXIF Data from ZIP Image: " . print_r($exifDataFromZip, true) . "\n";
    } else {
        echo "Image not found in ZIP file.\n";
    }
} else {
    echo "Failed to open ZIP file.\n";
}

?>