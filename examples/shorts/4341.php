<?php
// Example of integrating spreadsheets in PHP using PhpSpreadsheet

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add data to the spreadsheet
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Email');
$sheet->setCellValue('A2', 'John Doe');
$sheet->setCellValue('B2', 'john@example.com');
$sheet->setCellValue('A3', 'Jane Smith');
$sheet->setCellValue('B3', 'jane@example.com');

// Write the spreadsheet to a file
$writer = new Xlsx($spreadsheet);
$writer->save('sample_spreadsheet.xlsx');

// Read from an existing spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('sample_spreadsheet.xlsx');
$sheet = $spreadsheet->getActiveSheet();

// Display the data from the spreadsheet
foreach ($sheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    foreach ($cellIterator as $cell) {
        echo $cell->getValue() . ' ';
    }
    echo "\n";
}
?>