<?php

echo "Digite um número inteiro (ou -1 para terminar): ";
$numero = trim(fgets(STDIN));

if ($numero == -1) {
    echo "Você digitou -1, operação encerrada.";
} else {
    $menor = $numero;
    $maior = $numero;
    while ($numero != -1){
        echo "Digite um número inteiro (ou -1 para terminar): ";
        $numero = trim(fgets(STDIN));
        if ($numero == -1) {
            echo "Você digitou -1, operação encerrada.\n";
        } else {
            if ($numero > $maior) {
                $maior = $numero;
            } 
            if ($numero < $menor) {
                $menor = $numero;
            } 
        }
    }
    echo "O maior número digitado foi $maior e o menor foi $menor.";
}

