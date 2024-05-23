<?php

echo "Digite um número: ";
$numero = trim(fgets(STDIN));

$print = $numero % 2 == 0? "O número é par." : "O número é ímpar.";
echo $print;