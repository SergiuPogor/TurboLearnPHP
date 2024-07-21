<?php

// PHP code example for generating fractal patterns dynamically using GD library
$image_width = 500;
$image_height = 1000;

// Create a blank image
$image = imagecreatetruecolor($image_width, $image_height);

// Define function to draw fractal pattern recursively
function drawFractal($image, $x, $y, $size) {
    if ($size < 2) {
        return;
    }
    $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagefilledrectangle($image, $x, $y, $x + $size, $y + $size, $color);
    $new_size = $size / 2;
    drawFractal($image, $x, $y, $new_size);
    drawFractal($image, $x + $new_size, $y, $new_size);
    drawFractal($image, $x, $y + $new_size, $new_size);
    drawFractal($image, $x + $new_size, $y + $new_size, $new_size);
}

// Draw the fractal pattern starting from the top-left corner
drawFractal($image, 0, 0, $image_width);

// Output the image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
