<?php

require __DIR__ . '/src/Carro.php';

$carro1 = new Carro('Volkswagen', 'Gol', 2005);
$carro2 = new Carro('Fiat', 'Palio', 2010);


$carro1->acelerar();
$carro2->frear();

echo Carro::getlocadora();