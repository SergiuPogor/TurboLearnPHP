// Example PHP code to create pixelated graphics using the GD library

// Function to create a pixelated effect on an image
function pixelateImage($filePath, $pixelSize) {
    // Load the image
    $image = imagecreatefromjpeg($filePath);
    if (!$image) {
        die("Failed to load image.");
    }

    // Get image dimensions
    $width = imagesx($image);
    $height = imagesy($image);

    // Create a new true color image
    $pixelatedImage = imagecreatetruecolor($width, $height);

    // Loop through the image in blocks of pixelSize
    for ($y = 0; $y < $height; $y += $pixelSize) {
        for ($x = 0; $x < $width; $x += $pixelSize) {
            // Get the color of the pixel at the top-left corner of the block
            $rgb = imagecolorat($image, $x, $y);
            
            // Draw a rectangle with that color
            imagefilledrectangle($pixelatedImage, $x, $y, $x + $pixelSize - 1, $y + $pixelSize - 1, $rgb);
        }
    }

    // Save the pixelated image
    imagejpeg($pixelatedImage, 'pixelated_' . basename($filePath));

    // Clean up
    imagedestroy($image);
    imagedestroy($pixelatedImage);

    echo "Pixelated image created successfully.";
}

// Path to the image file
$filePath = 'path/to/your/astronomical_image.jpg';

// Pixel size for the pixelation effect
$pixelSize = 10;

// Apply the pixelation effect
pixelateImage($filePath, $pixelSize);