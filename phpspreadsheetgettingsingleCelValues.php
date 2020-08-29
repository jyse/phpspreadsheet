<?php

ini_set('max_execution_time', 0);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$excel = IOFactory::load('examplefirstquarter2020.xls');

$excel->setActiveSheetIndex(0);


echo '<table>' . PHP_EOL;

$activeWorksheet = $excel->getActiveSheet();

$cellC2 = $activeWorksheet->getCell('C2');
$cellC3 = $activeWorksheet->getCell('C3');

$newValue = $cellC2->getValue() + $cellC3->getValue();

echo 'New value: ' . $newValue . ' consists of value of C2: ' . $cellC2->getValue() . ' and of value C3 which is ' . $cellC3->getValue() . PHP_EOL;

// foreach ($activeWorksheet->getRowIterator() as $row) {

    // echo '<tr>' . PHP_EOL;
        // $cellIterator = $row->getCellIterator();
        // $cellIterator->setIterateOnlyExistingCells(FALSE);

    // foreach ($cellIterator as $cell) {
    //     echo '<td>' .

    //          $cell->getValue() .

    //          '</td>' . PHP_EOL;
    // }
// }
echo '</table>' . PHP_EOL;

?>