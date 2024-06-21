<?php

// Fazer utilizando array

echo "Digite o número que você deseja saber a tabuada: ";
$numero = trim(fgets(STDIN));

for ($i = 1; $i <= 10; $i++) {
    $array[$i] = $i * $numero;
}

foreach ($array as $key => $value) { 
    echo "$key x $numero = $value" . PHP_EOL;
}