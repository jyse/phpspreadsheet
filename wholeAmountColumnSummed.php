<?php

ini_set('max_execution_time', 0);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$excel = IOFactory::load('examplefirstquarter2020.xls');
$excel->setActiveSheetIndex(0);

echo '<table>' . PHP_EOL;

$activeWorksheet = $excel->getActiveSheet();

$accountNumber = $activeWorksheet->getCell('A1');
$date = $activeWorksheet->getCell('B1');
$amount = $activeWorksheet->getCell('C1');
$description = $activeWorksheet->getCell('D1');

foreach ($activeWorksheet->getRowIterator() as $row) {

    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE);

    echo '<tr>' . PHP_EOL;

      foreach ($cellIterator as $cell) {

        if ($cell->getCoordinate()[0] == 'C') {

            if (is_numeric($cell->getValue())) {

                $total += $cell->getValue();

                echo $cell->getCoordinate() . PHP_EOL . $total . "<br>";


            }
            // $start = $activeWorkSheet
            // $amountCellCoordinate = $cell->getCoordinate();


        }
    }
}
echo '</table>' . PHP_EOL;

?>


<!-- cellC2 = $activeWorksheet->getCell('C2');
$cellC3 = $activeWorksheet->getCell('C3');

$newValue = $cellC2->getValue() + $cellC3->getValue();

$rekeningNummer = $activeWorksheet->getCell('A2');
echo $rekeningNummer . PHP_EOL;


echo 'New value: ' . $newValue . ' consists of value of C2: ' . $cellC2->getValue() . ' and of value C3 which is ' . $cellC3->getValue() . PHP_EOL;

 -->

