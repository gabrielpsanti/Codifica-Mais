<?php

echo "Digite um número: \n";
$n1 = trim(fgets(STDIN));
echo "Digite outro número: \n";
$n2 = trim(fgets(STDIN));

$soma = $n1 + $n2;

echo "A soma dos dois números é: $soma";
