<?php
//call the autoload
require 'vendor/autoload.php';

//load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// call IOFactory instead of xlsx wrtier
use PhpOffice\PhpSpreadsheet\IOFactory;

$excel = IOFactory::load('firstquarter2020.xls');

//get current active sheet (first sheet)
$excel->setActiveSheetIndex(0);

echo "<table>";

//first row of data series
$i = 1;

//loop until the end of data series(cell contains empty string):
while ($excel->getActiveSheet()->getCell('A'.$i)->getValue() !== "") {

    //get cells value
    $rekeningNummer = $excel->getActiveSheet()->getCell('A' . $i)->getValue();
    $date = $excel->getActiveSheet()->getCell('B' . $i)->getValue();
    $amount = $excel->getActiveSheet()->getCell('C' . $i)->getValue();
    $description = $excel->getActiveSheet()->getCell('D' . $i)->getValue();
}

// echo
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