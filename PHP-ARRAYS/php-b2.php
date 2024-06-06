<?php

function calcularGorjeta(float $conta, float $gorjeta) :array //é boa prática utilizar os mesmos nomes de variáveis na função e no corpo do texto?
{
    $calc1 = $conta * (($gorjeta/100));
    $calc2 = $conta + $calc1;
    $total = ['nominalGorjeta' => $calc1, 'totalCalculado' => $calc2];
    return $total;
}

echo "Digite o valor da conta: ";
$conta = trim(fgets(STDIN));
echo "Digite a porcentagem da gorjeta: ";
$gorjeta = trim(fgets(STDIN));

$total = calcularGorjeta($conta, $gorjeta);
echo "O valor total da conta é de: R$" . number_format($total['totalCalculado'], 2, ',', '.') . " (R$" . number_format($conta, 2, ',', '.') . " + R$" . number_format($total['nominalGorjeta'], 2, ',', '.') . ")";