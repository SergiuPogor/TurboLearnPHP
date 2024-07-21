<?php
// Example of integrating cognitive science kits in PHP using PHP-ML

require 'vendor/autoload.php';

use Phpml\Classification\KNearestNeighbors;
use Phpml\Dataset\ArrayDataset;

// Sample dataset
$samples = [
    [1.0, 2.0],
    [1.5, 1.8],
    [5.0, 8.0],
    [6.0, 8.5],
    [1.3, 1.8],
    [8.0, 8.0],
    [9.0, 9.0],
    [7.0, 9.5]
];
$labels = ['A', 'A', 'B', 'B', 'A', 'B', 'B', 'B'];

// Create the classifier
$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

// Predict the label for a new sample
$newSample = [2.0, 2.0];
$predictedLabel = $classifier->predict($newSample);

echo "The predicted label for the new sample is: " . $predictedLabel . "\n";

// Example of analyzing a dataset with PHP-ML
$data = new ArrayDataset($samples, $labels);
$predictor = new KNearestNeighbors();
$predictor->train($data->getSamples(), $data->getTargets());

$newData = [3.0, 3.0];
$prediction = $predictor->predict($newData);

echo "The prediction for the new data point is: " . $prediction . "\n";
?>