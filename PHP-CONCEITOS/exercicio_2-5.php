<?php

echo "Digite um número: ";
$numero = trim(fgets(STDIN));

if ($numero % 2 == 0) {
    echo "O número é par.";
} else {
    echo "O número é ímpar.";
}
