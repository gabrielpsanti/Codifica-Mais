<?php

echo "Preciso que você digite dois números INTEIROS (A e B), sendo necessariamente B maior que A. \n";
echo "Digite o primeiro número (A): \n";
$n1 = trim(fgets(STDIN));
echo "Digite o segundo número (B): \n";
$n2 = trim(fgets(STDIN));  


if ($n1 >= $n2) {
    while ($n1 >= $n2) {
        echo "Digite os números novamente. O segundo número (B) precisa ser maior que o primeiro (A)!\n";
        echo "Digite o primeiro número (A): \n";
        $n1 = trim(fgets(STDIN));
        echo "Digite o segundo número (B): \n";
        $n2 = trim(fgets(STDIN));  
    }
}
$soma = 0;

while ($n2 >= $n1) {
    if ($n2 % 2 != 0) {
        $soma = $soma + $n2;
    }
    $n2--;
}

echo "A soma de todos os números ímpares no intervalo [a, b] (inclusive) é: $soma";