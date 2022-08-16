<?php
/*
 * 1.  Grąžinkite visų lyginių skaičių, esančių $numbers masyve, sumą
 */
$numbers = [
    15,
    55,
    66,
    91,
    100,
    995,
    17,
    550,
];
$selectedNumbers = [];
foreach($numbers as $number){
    if($number %2 === 0){
        $selectedNumbers []= $number;
    }
}
var_dump(array_sum($selectedNumbers));

/*
 * 2. Grąžinkite visų skaičių, esančių $numbers masyve, sandaugą
*/
   $numbers = [
       [1, 3, 5],
       [55, 87, 100],
       [12],
       [],
   ];

   function product($carry, $number)
   {
       $carry *= $number;
       return $carry;
   }
   $multiplication = 1;
   foreach ($numbers as $number){
       if(!empty($number)){
           $multiplication *= (array_reduce($number, 'product', 1));
    }
}
 var_dump($multiplication);

/*
 * 3.     Masyve $holidays turime kelionių agentūros siūlomas keliones su kaina ir dalyvių skaičiumi.
Terminale išspausdinkite santrauką, kurioje matytusi miesto pavadinimas, kelionių pavadinimai ir dalyvių sumokėta suma
      Dėmesio! Santraukoje nerodykite tų kelionių, kurių kaina yra null.

      Destination "Paris".
Titles: "Romantic Paris", "Hidden Paris"
      Total: 99500
************
      Destination "New York"
      ...

 */

$holidays = [
    [
        'title' => 'Romantic Paris',
        'destination' => 'Paris',
        'price' => 1500,
        'tourists' => 55,
    ],
    [
        'title' => 'Amazing New York',
        'destination' => 'New York',
        'price' => 2699,
        'tourists' => 21,
    ],
    [
        'title' => 'Spectacular Sydey',
        'destination' => 'Sydey',
        'price' => 4130,
        'tourists' => 9,
    ],
    [
        'title' => 'Hidden Paris',
        'destination' => 'Paris',
        'price' => 1700,
        'tourists' => 10,
    ],
    [
        'title' => 'Emperors of the past',
        'destination' => 'Beijing',
        'price' => null,
        'tourists' => 10,
    ],
];

function holidaysInfo(array $holidays) : void
{
    $destination = array_column($holidays, "destination");
    $duplicates = array_count_values($destination);
    $moreTitles = [];
    $oneTitle = [];
    foreach ($holidays as  $proposal) {
        foreach ($duplicates as $key => $duplicate) {
            if ($proposal['price'] !== null) {
                if ($duplicate > 1 && $proposal["destination"] === $key) {
                    $moreTitles [$proposal['destination']][]= $proposal;
                } elseIf($duplicate === 1 && $proposal["destination"] === $key) {
                    $oneTitle []= $proposal;
                }
            }
        }
    }
$holidaysDetails = [];


    $total = 0;
foreach ($moreTitles as $city => $value){
    $holidaysDetails []= 'Destination: "' . $city. '".' . PHP_EOL.'Titles: ';
    foreach ($value as $details){
        $holidaysDetails []= $details['title'].', ';
                $total += $details['price'] * $details['tourists'];
    }
    $holidaysDetails []= PHP_EOL.'Total: '.$total.PHP_EOL.'******************' . PHP_EOL;
}

    foreach ($oneTitle as $city) {
        $holidaysDetails[]= 'Destination: "' . ($city['destination']) . '".' . PHP_EOL.'Title: "' . $city['title'] .
            '"' . PHP_EOL.'Total: "' . $city['price'] * $city['tourists'].PHP_EOL.'******************' . PHP_EOL;
    }

    $implode = implode("", $holidaysDetails);
    echo $implode;

///*
// * 4. Pakoreguokite 3 užduotį taip, kad ji duomenis rašytų ne į terminalą, o spausdintų į failą
// */

    $fileName = 'holidaysDetails.json';
    $deserializedData = json_encode($holidaysDetails, JSON_PRETTY_PRINT);
    file_put_contents($fileName,$deserializedData);
}
holidaysInfo($holidays);
