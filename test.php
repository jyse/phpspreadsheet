<?php

// ini_set('max_execution_time', 0);

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = IOFactory::load('1jan.17aug.Allaccounts.xls');

$parsedData = [];

$fixedCosts = [
    'SPAREN' => 'Sparen',
    'DEBETRENTE' => 'Bank',
    'Ohra' => 'Zorgverzekering',
    'CZ Groep' => 'Zorgverzekering',
    'Nieuwburen' => 'Huur woning',
    'Jumbo' => 'Boodschappen (levensmiddelen)',
    'JUMBO' => 'Boodschappen (levensmiddelen)',
    'Albert Heijn' => 'Boodschappen (levensmiddelen)',
    'ALBERT HEIJN' => 'Boodschappen (levensmiddelen)',
    'AH to go' => 'Boodschappen (levensmiddelen)',
    'Lidl' => 'Boodschappen (levensmiddelen)',
    'OneFit' => 'Sporten (fitness)',
    'Picnic' => 'Boodschappen (levensmiddelen)',
    'Spotify' => 'Productiviteit',
    'BELASTINGDIENST' => 'Belastingdienst',
    'Groceries' => 'Bunq rekening Groceries',
    'AKH The' => 'Ouders',
    'Brightfish' => 'Salaris',
    'Loogman' => 'Auto wassen',
    'van verzekering 472571230' => 'Verzekering ABN',
    'ZIGGO' => 'Internet',
    'COINBASE' => 'Investeringen',
    'ANWB' => 'Auto-verzekering',
    'T-MOBILE NETHERLANDS' => 'Telefoon-abonnement',
    'PEARLE' => 'Persoonlijke verzorging',
    'NETFLIX INTERNATIONAL' => 'Activiteiten',
    'Waternet' => 'Water',
    'WATERNET' => 'Water',
    'INNOVA ENERGIE' => 'Energie',
    'Gemeente' => 'Gemeente Amsterdam',
    'LTSS 1' => 'Sparen',
    'BUDGETENERGIE' => 'Energie',
    'Maandtariferingsnota' => 'Bank',
    'JESSY Y S THE' => 'Overboeking naar eigen rekening',
    'J.Y.S. The' => 'Overboeking',
    'Bunq' => 'Storting naar / van Bunq',
    'Necessities' => 'Overboeking',
    'SPORT HOTEL' => 'Sporten (Tennis)',
    'UNIGARANT' => 'Auto-verzekering',
    'NL07ABNA0598249389' => 'Overboeking (eigen rekening)',
    'Jaarpremie' => 'Jaarpremie BANK',
    'Diana' => 'Huur huisgenoot / terugbetaling',
    'MICROSOFT' => 'Productiviteit',
    'Q PARK' => 'Auto (parkeren)',
    'AUTOBEDRIJF' => 'Auto (langs Maasgroep)',
];

$flexibleCosts = [
    'LINKEDIN' => 'Digitale aankoop',
    'CODING' => 'Coding mentor',
    'Mollie' => 'Digitale aankoop',
    'Tikkie' => 'Tikkie',
    'Schoenmaker' => 'Huis',
    'Shilla' => 'Afhaal (eten)',
    'alloverpiercings' => 'Shoppen',
    'STORTING' => 'Geld storten',
    'Zalando' => 'Shoppen',
    'Coolblue' => 'Shoppen',
    'Pathe de Munt' => 'Activiteiten',
    'Deliveroo' => 'Thuisbezorging (eten)',
    'Eweka' => 'Digitale services',
    'EWEKA' => 'Digitale services',
    'Centraal Justitieel Incassobureau' => 'Schuld',
    'Success Resources' => 'Opleiding (Quantum Leap)',
    'SUCCESS RESOURCES' => 'Opleiding (Quantum Leap)',
    'bol.com b.v.' => 'Shoppen',
    'BOLCOM' => 'Shoppen',
    'Parkeren' => 'Auto',
    'Holland & Barrett' => 'Persoonlijke verzorging',
    'NS' => 'OV',
    'GVB' => 'OV',
    'NAT POSTCODE LOTERIJ' => 'Nationale PostCodeLoterij',
    'Berlin' => 'Reizen',
    'Ikea' => 'Huis',
    'Toko Manisan' => 'Afhaal (eten)',
    'LAKWERK' => 'Activiteiten',
    'Geldmaat' => 'Pinnen',
    'Channeling Coaching' => 'Spirituele begeleiding',
    'ING Bank NV Betaalverzoek' => 'Tikkie',
    'Vishandel Kroon' => 'Afhaal (eten)',
    'GGN Mastering Credit' => 'Digitale aankoop',
    'Costes' => 'Shoppen',
    'Sauna' => 'Activiteiten',
    'Fysio' => 'Fysio',
    'HEMA' => 'Shoppen',
    'HOXTON HOTEL' => 'Activiteiten',
    'Scheltema' => 'Shoppen',
    'STG MOLLIE PAYMENTS' => 'Digitale aankoop',
    'PayPal' => 'Digitale aankoop',
    'Tree Full of Scones' => 'Opleiding (Business)',
    'ASOS' => 'Shoppen',
    'Worldpay' => 'Shoppen',
    'KFC' => 'Afhaal (eten)',
    'TwinSport' => 'Shoppen',
    'SEOUL FOOD' => 'Afhaal (eten)',
    'CAFE' => 'Activiteiten',
    'IJMUIDEN' => 'Activiteiten',
    'SHEIN.COM' => 'Shoppen',
    'IKEA' => 'Huis',
    'Bloomon' => 'Gift',
    'Milagros mundo' => 'Shoppen',
    'Hilda' => 'Activiteiten',
    'Luis Thoolen' => 'Activiteiten',
    'Montolalu' => 'Activiteiten',
    'Amely' => 'Activiteiten',
    'Marlon' => 'Activiteiten',
    'Kruidvat' => 'Persoonlijke verzorging',
    'FonQ' => 'Shoppen',
    'Adyen' => 'Digitale aankoop',
    'Orientique' => 'Shoppen',
    'Bakkerij Hulleman' => 'Afhaal (eten)',
    'HMS Host International' => 'Activiteiten',
    'Nourished Nederland' => 'Shoppen',
    'Spiritual Garden' => 'Shoppen',
    'Facefactory' => 'Persoonlijke verzorging (gezichtsverzorging)',
    'Anja Luczak' => 'Spiritual begeleiding',
    'Oriental City' => 'Activiteiten',
    'BEA NR:' => 'Nog onbekende categorie',
    'BEA   NR:' => 'Nog onbekende categorie',
];

$numberActiveRows = $spreadsheet->getActiveSheet()->getHighestRow(); // e.g. 10


for($i = 2; $i <= $numberActiveRows; $i++) {

    $dateNotation = strtotime($spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $i)->getCalculatedValue());
    $date = date('d F Y', $dateNotation);

    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $i, $date);

    $amount = $spreadsheet->getActiveSheet()->getCell('C'. $i)->getValue();

    echo $amount;
    if (is_int($amount) && $amount > 0) {
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $i, 'positive');

    } elseif (!is_int($amount) || $amount < 0) {
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $i, 'negative');
    }

}

foreach($fixedCosts as $target => $category) {

    for($i = 2; $i <= $numberActiveRows; $i++) {

        $description = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $i)->getCalculatedValue();

        if (strpos($description, $target)) {
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $i, $target);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, $i, $category);
        }
    }
}

foreach($flexibleCosts as $target => $category) {

    for($i = 2; $i <= $numberActiveRows; $i++) {

        $description = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $i)->getCalculatedValue();

        if (strpos($description, $target)) {

            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $i, $target);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, $i, $category);
        }
    }
}

$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
$nameSheet = 'categoriesAdded';
$writer->save($nameSheet . '.xls');






// $object = new stdClass();
// $parsedData = [];

// for($i = 2; $i <= $numberActiveRows; $i++) {

//     $row = 'Row' . $i;

//     $parsedData[$row] = new stdClass();
//     $parsedData[$row]->id = $i;

//     $accountCoordinate = $worksheet->getCell('A'. $i);
//     $parsedData[$row]->account = $accountCoordinate->getValue();

//     $dateCoordinate = $worksheet->getCell('B'. $i);
//     $d = strtotime($dateCoordinate->getValue());
//     $parsedData[$row]->date = date('d F Y', $d);

//     $amountCoordinate = $worksheet->getCell('C'. $i);
//     $parsedData[$row]->amount = $amountCoordinate->getValue();

//     $descriptionCoordinate = $worksheet->getCell('D'. $i);
//     $parsedData[$row]->description = $descriptionCoordinate->getValue();

//     // var_dump($table['row']->description);

// }














// schrijf een nieuwe spreadsheet
//

// echo '<table>';
//     echo '<tr>';

//         echo '<th>' . 'Vaste lasten' .  '</th>' . PHP_EOL;
//         echo '<th>' . 'Bedrag per maand' .  '</th>'. PHP_EOL;

//     echo '</tr>';

//     foreach($fixedCosts as $target => $cost) {

//         for($i = 2; $i <= $numberActiveRows; $i++) {

//             echo '<tr>';

//             if(strpos($table['Row' . $i]->description, $target)) {
//                 echo '<td>' . $cost . '</td><br>' . PHP_EOL;
//             } else {
//                 // echo '<td>' . 'No category yet' .  '</td><br>' . PHP_EOL;
//             }

//             echo '</tr>';
//         }
//     }

// echo '</table>';

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










    // $description = $worksheet->getCellByColumnAndRow(4, $i)->getValue();

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
