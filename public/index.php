<?php

require './vendor/autoload.php';

$test = new App\Test();

use App\Game\Personnage;

$arthur = new Personnage('Arthur');

$arthur->afficher();

var_dump($test);
