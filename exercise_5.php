<?php

/*
5. Parašykite programą, kuri Jūsų susigalvotus duomenis paimtų iš failo ir atspausdintų terminale.
*/

$frontEnd = [
        [
        'tema' => "html/css",
        'valandų_skaičius' => 100,
        "statusas" => "užbaigta"
    ],
    [
        'tema' => "js",
        'valandų_skaičius' => 140,
        "statusas" => "užbaigta"
    ],
    [
        'tema' => "js",
        'valandų_skaičius' => 140,
        "statusas" => "užbaigta"
    ],
    [
        'tema' => "php",
        'valandų_skaičius' => 120,
        "statusas" => "vyksta"
    ],
    [
        'tema' => "laravel_karkasa",
        'valandų_skaičius' => 100,
        "statusas" => "laukiama"

    ],
    [
        'tema' => "baigiamasis_projektas",
        'valandų_skaičius' => 20,
        "statusas" => "laukiama"
    ]
    ];

$deserialization = json_encode($frontEnd, JSON_PRETTY_PRINT);
file_put_contents('ca.json', $deserialization);

$data = file_get_contents('ca.json');
$serialization = json_decode($data, true);

foreach ($serialization as $kriterijus){
    if($kriterijus['statusas'] === 'vyksta'){
        print_r($kriterijus);
    }
}
