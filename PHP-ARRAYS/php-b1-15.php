<?php

for ($i = 1; $i <= 7; $i++) { 
    echo "Digite o $i" . "º número: ";
    $array[$i] = trim(fgets(STDIN));
}

echo "Digite o número que você deseja procurar no conjunto: ";
$numero = trim(fgets(STDIN));

$aparicoes = 0;
$posicoes = [];

foreach ($array as $key => $value) {
    if ($value == $numero) {
        $aparicoes++;
        $posicoes[] = $key;
    }
}

// foreach ($posicoes as $key => $value) { // tester
//     echo $key ." | ". $value ."\n";
// }

if ($aparicoes > 0) {
    echo "O número $numero apareceu $aparicoes vezes nas posicoes: ";
    foreach ($posicoes as $key => $value) {
        echo $value . " ";
    }
} else {
    echo "O número $numero não está presente no conjunto.";
}

