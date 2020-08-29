<?php

//remove time restriction
ini_set('max_execution_time', 0);

//call the autoload
require 'vendor/autoload.php';

//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// call IOFactory instead of xlsx wrtier
use PhpOffice\PhpSpreadsheet\IOFactory;

$excel = IOFactory::load('examplefirstquarter2020.xls');

//get current active sheet (first sheet)
$excel->setActiveSheetIndex(0);

echo "<table>";

//first row of data series
$i = 1;

echo '<table>' . PHP_EOL;
foreach ($excel->getActiveSheet()->getRowIterator() as $row) {

    echo '<tr>' . PHP_EOL;
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE);

    foreach ($cellIterator as $cell) {
        echo '<td>' .

             $cell->getValue() .

             '</td>' . PHP_EOL;
    }
}
echo '</table>' . PHP_EOL;

echo "

    <tr>
        <td>" . $rekeningNummer . "</td>
        <td>" . $date . "</td>
        <td>" . $amount . "</td>
        <td>" . $description . "</td>
    ";

    //and DON't FORGET to increment the row pointer ($i);
    $i++;

echo "</table>";

?>