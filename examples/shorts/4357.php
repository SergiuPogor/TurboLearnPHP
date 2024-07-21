<?php
// PHP Generators for Efficient Data Handling

function getLargeDataset() {
    for ($i = 0; $i < 1000000; $i++) {
        yield $i;
    }
}

// Using generator to iterate over large dataset
$generator = getLargeDataset();

foreach ($generator as $value) {
    if ($value % 100000 === 0) {
        echo "Processing value: $value\n";
    }
}

// Generators: making your data handling as light as a feather!
// P.S. Who knew processing a million records could be this breezy?
?>