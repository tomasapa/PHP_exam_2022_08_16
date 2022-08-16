<?php

/*
 6. Parašykite programą, kuri per argumentų padavimą terminale paleidžiant funkciją juos priimtų ir juos
sudaugintų tarpusavyje ir pakeltu kvadratu. Atkreipkite dėmesį, kad jeigu argumentas yra paduodamas ne
skaičius, reikia, kad terminale gautumėme atitinkamą klaidos kodą ir pranešimą
 */

function getArgument (array $argv) : void
{
    unset($argv[0]);
    $countFilter = count( array_filter($argv, 'is_numeric' ));

        if (count($argv) === $countFilter ) {
            if ($countFilter < 2) {
                echo "Please write more then one number!";
            } else {
                $product = array_product($argv);
                $product *= $product;
                echo $product;
            }
        }
        else
        {
            echo "Error".PHP_EOL;
            echo "Argument elements has a non numeric value!";
        }
    }
getArgument($argv);

/*
 * testavimui:
php -f .\exercise6_argv.php 1 2 3
php -f .\exercise6_argv.php 1 2 3 'Vytautas'
php -f .\exercise6_argv.php 1 2 3 'Vytautas'"Bronislovas" false
 */