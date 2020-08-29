<?php

// ini_set('max_execution_time', 0);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$excel = IOFactory::load('1jan.17aug.Allaccounts.xls');
$excel->setActiveSheetIndex(0);

$worksheet = $excel->getActiveSheet();

$parsedData = [];
$object = new stdClass();

$fixedCosts = [
    'Ohra' => 'Zorgverzekering',
    'Nieuwburen' => 'huur',
    'Jumbo' => 'Boodschappen (levensmiddelen)',
    'Albert Heijn' => 'Boodschappen (levensmiddelen) jippie ja yeey',
    'Lidl' => 'Boodschappen (levensmiddelen)'

];

$numberActiveRows = $worksheet->getHighestRow(); // e.g. 10

$table = [];

for($i = 2; $i <= $numberActiveRows; $i++) {

    $row = 'Row' . $i;

    $table[$row] = new stdClass();
    $table[$row]->id = $i;

    $accountCoordinate = $worksheet->getCell('A'. $i);
    $table[$row]->account = $accountCoordinate->getValue();

    $dateCoordinate = $worksheet->getCell('B'. $i);
    $d = strtotime($dateCoordinate->getValue());
    $table[$row]->date = date('d F Y', $d);

    $amountCoordinate = $worksheet->getCell('C'. $i);
    $table[$row]->amount = $amountCoordinate->getValue();

    $descriptionCoordinate = $worksheet->getCell('D'. $i);
    $table[$row]->description = $descriptionCoordinate->getValue();

    // var_dump($table['row']->description);

}

$monthlySheet = new \PHPOffice\PHPSpreadsheet\Spreadsheet();

echo '<table>';
    echo '<tr>';

        echo '<th>' . 'Vaste lasten' .  '</th>' . PHP_EOL;
        echo '<th>' . 'Bedrag per maand' .  '</th>'. PHP_EOL;

    echo '</tr>';

    foreach($fixedCosts as $target => $cost) {

        for($i = 2; $i <= $numberActiveRows; $i++) {

            echo '<tr>';

            if(strpos($table['Row' . $i]->description, $target)) {
                echo '<td>' . $cost . '</td><br>' . PHP_EOL;
            } else {
                // echo '<td>' . 'No category yet' .  '</td><br>' . PHP_EOL;
            }

            echo '</tr>';
        }
    }

echo '</table>';

// echo '<table>';
//     echo '<tr>';

//     echo '<th>' . 'Id' .  '</th>' . PHP_EOL;
//     echo '<th>' . 'Account' .  '</th>'. PHP_EOL;
//     echo '<th>' . 'Date' .  '</th>'. PHP_EOL;
//     echo '<th>' . 'Description' .  '</th>'. PHP_EOL;

//     echo '</tr>';

//     foreach($table as $row) {

//         echo '<tr>';
//             echo '<td>' . $row->id .  '</td>' . PHP_EOL;
//             echo '<td>' . $row->account .  '</td>' . PHP_EOL;
//             echo '<td>' . $row->date .  '</td>'. PHP_EOL;
//             echo '<td>' . $row->description .  '</td><br>' . PHP_EOL;
//         echo '</tr>';
// echo '</table>';










    $description = $worksheet->getCellByColumnAndRow(4, $i)->getValue();

    // if (strpos($description, 'Ohra') !== FALSE) {

    //     $amount = $worksheet->getCellByColumnAndRow(3, $i)->getValue();
    //     $totalOhra += $amount;
    //     echo '<td>' . 'Categorie: Ohra Verzekeringen per maand = '. $amount .  '</td>' . "<br>";

    // }
    // printf('Beschrijving: ' . $description . "<br>");

// $activeNumberRow = substr($coordinateActiveCell, 1);

// foreach ($activeWorksheet->getRowIterator() as $row) {

//     $cellIterator = $row->getCellIterator();
//     $cellIterator->setIterateOnlyExistingCells(FALSE);

//     foreach ($cellIterator as $cell) {

    // $coordinateActiveCell = $cell->getCoordinate();


    // if ($activeNumberRow > 1){

    //     echo '<table>' . PHP_EOL;
    //     echo '<tr>';

    //      if ($cell->getCoordinate()[0] == 'D') {

    //         $object->description = $cell->getValue();

    //         echo '<td>' . 'Beschrijving:  ' . $object->description . '</td>';

    //

    //         //         echo '<td>' . 'Afnemer: ' . $categoryWord . '</td>';
    //         //         echo '<td>' . 'Category: ' . $accountCategories[$categoryWord] . '</td>';

    //         //     }
    //         // }

    //         if (strstr($object->description, "Albert Heijn")) {
    //             $object->category = 'Boodschappen (Levensmiddelen)';
    //         }

    //         // echo '<td>' . 'Beschrijving: ' . $object->description . '</td>';
    //     }

        // if ($cell->getCoordinate()[0] == 'A') {
        //     $object->accountNumber = $cell->getValue();

        //     echo '<td>' . 'Rekeningnummer: ' . $object->accountNumber . '</td>';
        // }

        // if ($cell->getCoordinate()[0] == 'B') {

        //     $dateCoordinate = $activeWorksheet->getCell($cell->getCoordinate());
        //     $d = strtotime($dateCoordinate->getValue());

        //     $object->date = date('d F Y', $d);

        //     echo '<td>' . 'Datum: ' . $object->date . '</td>';

        // }

        // if ($cell->getCoordinate()[0] == 'C') {

        //     $object->amount = $cell->getValue();

        //     echo '<td>' . 'Transactiebedrag: ' . $object->amount . '</td>';
        // }



//         echo '</tr>' . PHP_EOL;
//     }
// }
// echo '</table>' . PHP_EOL;


// different tasks
// read description and make a category column and write the value
// read categories -
// read from the transaction file (calculations)
// and write it to the template
// write files in excelsheet

// task - different files and then command



       // $foundAccount = in_array($cell->getValue(), $accountNumbers) ? $cell->getValue() : $cell->getValue() . 'unkowon';

        // if ($cell->getCoordinate()[0] == 'A' && $cell->getValue() == $foundAccount) {

        //     $activeRowsAccount[$foundAccount] = $activeNumberRow;
        //     echo $activeRowsAccount;
        // }


        // if ($cell->getCoordinate()[0] == 'D') {

        //     $description = $activeWorksheet->getCell('D' . $activeNumberRow);

        //     if (strpos($description, 'Albert Heijn') || strpos($description, 'ALBERT HEIJN')) {

        //         $groceryCategory = $coordinateActiveCell->getCell('E' . $activeNumberRow)->setValue('Groceries');

        //         // $groceryTransaction = $cell->getValue($coordinateActiveCell);

        //         echo '<td>' . $groceryCategory . '</td>';

        //     }
        // }
        // echo '<td>' .

        //  $cell->getValue() .
        //  '</td>' . PHP_EOL;
