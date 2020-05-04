<?php
//call the autoload
require 'vendor/autoload.php';

//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// call xlsx writer class to maken an excel file
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//make new spreadsheet object
$spreadsheet = new Spreadsheet();

//get current active sheet (first sheet)
$sheet = $spreadsheet->getActiveSheet();

// set the value of cell a1 to "hello World"
$sheet->setCellValue('A1', 'Hello World !');

//make an xlsx writer object using above spreadsheet
$writer = new Xlsx($spreadsheet);

// write the file in current directory
$writer->save('hello world.xlsx');




?>