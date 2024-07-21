// Example PHP code for generating thumbnails

// Path to the original image
$originalImagePath = 'path/to/original/image.jpg';

// Path to store generated thumbnails
$thumbnailPath = 'path/to/thumbnails/';

// Thumbnail dimensions
$thumbnailWidth = 200;
$thumbnailHeight = 150;

// Using GD Library for thumbnail generation
$originalImage = imagecreatefromjpeg($originalImagePath);
$thumbnailImage = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);

// Resize and create thumbnail
imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, imagesx($originalImage), imagesy($originalImage));

// Save thumbnail as JPEG
imagejpeg($thumbnailImage, $thumbnailPath . 'thumbnail.jpg');

// Free memory
imagedestroy($originalImage);
imagedestroy($thumbnailImage);

echo 'Thumbnail generated successfully!';