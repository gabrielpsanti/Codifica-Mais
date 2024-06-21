<?php

function calcularDesconto(float $valor, float $desconto) :float
{
    $total = $valor * (1 - ($desconto/100));
    return $total;
}

echo "Digite o valor do produto (em reais): ";
$valor = trim(fgets(STDIN));
echo "Digite o valor do desconto (em porcentagem): ";
$desconto = trim(fgets(STDIN));

$final = calcularDesconto($valor, $desconto);
echo "O valor final do produto é: R$" . number_format($final, 2, ',', '.');