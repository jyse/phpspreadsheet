<?php

ini_set('max_execution_time', 0);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$excel = IOFactory::load('rek49Year2019.xls');
$excel->setActiveSheetIndex(0);

$activeWorksheet = $excel->getActiveSheet();

$accountNumbers = ['598249389','472571230','498586642'];

$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

$col = 1;
$row = 2;

$value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();

echo $value;

foreach ($activeWorksheet->getRowIterator() as $row) {

    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE);

    foreach ($cellIterator as $cell) {

        $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
    }
}


//         $coordinateActiveCell = $cell->getCoordinate();
//         $activeNumberRow = substr($coordinateActiveCell, 1);
//         $account = $cell->getValue();

//         if (in_array($account, $accountNumbers) && $activeNumberRow > 1) {

//             echo '<table>' . PHP_EOL;
//             echo '<tr>' . 'Rekeningnummer: ' . $account . '</tr>';

//             if ($cell->getCoordinate()[0] == 'B') {

//                 $dateCoordinate = $activeWorksheet->getCell('B' . $activeNumberRow);
//                 $d = strtotime($dateCoordinate->getValue());

//                 echo '<td>' . date('d F Y', $d) . '</td>' . PHP_EOL;
//             }

//             if ($cell->getCoordinate()[0] == 'C') {

//                 $description = $activeWorksheet->getCell('D' . $activeNumberRow);

//                 if (strpos($description, 'Albert Heijn') || strpos($description, 'ALBERT HEIJN')) {

//                     $groceryTransaction = $cell->getValue($coordinateActiveCell);

//                     echo '<td>' . $groceryTransaction . '</td>';

//                 }

//             }

//         }
//         echo '</table>' . PHP_EOL;
//     }
//     echo '</tr>' . PHP_EOL;
// }

echo '</table>' . PHP_EOL;


// echo '<table>' . "\n";
// for ($row = 1; $row <= $highestRow; ++$row) {
//     echo '<tr>' . PHP_EOL;
//     for ($col = 1; $col <= $highestColumnIndex; ++$col) {
//         $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
//         echo '<td>' . $value . '</td>' . PHP_EOL;
//     }
//     echo '</tr>' . PHP_EOL;
// }
// echo '</table>' . PHP_EOL;
// Alternatively, you can take advantage


?>

<!--
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
$reader->setReadDataOnly(TRUE);
$spreadsheet = $reader->load("test.xlsx");

$worksheet = $spreadsheet->getActiveSheet();
// Get the highest row and column numbers referenced in the worksheet
$highestRow = $worksheet->getHighestRow(); // e.g. 10
$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

echo '<table>' . "\n";
for ($row = 1; $row <= $highestRow; ++$row) {
    echo '<tr>' . PHP_EOL;
    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
        $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
        echo '<td>' . $value . '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL



 -->



<!--                     // if (is_numeric($groceryTransaction)) {

                    //     echo $groceryTransaction;

                   // $totalValueGroceries += $groceryTransaction;
 -->

<!--                 // if (is_numeric($cell->getValue())) {

                //     $total += $cell->getValue();

                //     // echo $cell->getCoordinate() . PHP_EOL . $total . "<br>";
                // }
 -->
<!--
$d=strtotime("10:30pm April 15 2014");

echo "Created date is " . date("Y-m-d h:i:sa", $d);
 -->

<!-- cellC2 = $activeWorksheet->getCell('C2');
$cellC3 = $activeWorksheet->getCell('C3');

$newValue = $cellC2->getValue() + $cellC3->getValue();

$rekeningNummer = $activeWorksheet->getCell('A2');
echo $rekeningNummer . PHP_EOL;


echo 'New value: ' . $newValue . ' consists of value of C2: ' . $cellC2->getValue() . ' and of value C3 which is ' . $cellC3->getValue() . PHP_EOL;

 -->

