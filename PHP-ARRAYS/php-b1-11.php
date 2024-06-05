<?php

for ($i = 1; $i <= 6; $i++) {
    echo "Digite o $i" . "º número: ";
    $array1[$i] = trim(fgets(STDIN));
    $array2[$i] = $array1[$i] * 2;
}

for ($i = 1; $i <= 6; $i++ ) {
    echo "O dobro de $array1[$i] é: $array2[$i]" . PHP_EOL;
}