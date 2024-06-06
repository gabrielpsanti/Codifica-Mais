<?php

function converterTemperatura($temperatura, $unidade)
{
    if ($unidade == 'c'){
        $resultado = ($temperatura -32) * (5/9);
        echo "$temperatura ºF é o equivalente a $resultado ºC";
    } else {
        $resultado = ($temperatura * (9/5)) + 32;
        echo "$temperatura ºC é o equivalente a $resultado ºF";
    }
}

echo "Digite o valor da temperatura a ser convertida: ";
$temperatura = trim(fgets(STDIN));

$unidade = 0;

while ($unidade != "f" and $unidade  != "c") {
    echo "Digite 'c' para converter em Celsius e 'f' para converter em Fahrenheit: ";
    $unidade = trim(fgets(STDIN));
    if ($unidade != "f" and $unidade  != "c") {
        echo "Valor inválido, tente novamente.\n";
    }
}

converterTemperatura($temperatura, $unidade);