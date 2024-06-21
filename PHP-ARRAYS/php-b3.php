<?php

function calcularMetricas(float $largura, float $altura) :array
{
    $resultado = [
        'area' => ($largura * $altura),
        'perimetro' => (2 * ($largura + $altura))
    ];
    return $resultado;
}

echo "Digite a largura do retângulo: ";
$largura = trim(fgets(STDIN));
echo "Digite a altura do retângulo: ";
$altura = trim(fgets(STDIN));

$final = calcularMetricas($largura, $altura);

echo "Área:  $final[area]" . PHP_EOL;
echo "Perímetro: $final[perimetro]" . PHP_EOL;