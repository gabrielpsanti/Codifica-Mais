<?php

for ($i = 1; $i <= 5; $i++) {
    echo "Digite o $i" . "º número inteiro: ";
    $array[$i] = trim(fgets(STDIN));
}

// foreach ($array as $key => $value) { // tester
//     echo $key ." | ". $value ."\n";
// }

$soma = 0;

foreach ($array as $key => $value) {
    if ($value % 2 == 0) {
        $soma += $value;
    }
}

echo "A soma dos elementos pares é: $soma";

