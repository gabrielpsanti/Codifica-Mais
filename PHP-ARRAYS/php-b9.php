<?php

function calcularDescontoProgressivo($valorCompra)
{
    if ($valorCompra > 500) {
        return 0.2;
    } elseif ($valorCompra < 500 && $valorCompra > 100) {
        return 0.1;
    } else {
        return 0;
    }
}

function aplicarDesconto($valorCompra, $percentualDesconto)
{
    $valorFinal = $valorCompra * (1 - $percentualDesconto);
    return $valorFinal;
}

echo 'Digite o valor da compra: ';
$valorCompra = trim(fgets(STDIN));

$desconto = calcularDescontoProgressivo($valorCompra);
$final = aplicarDesconto($valorCompra, $desconto);

echo "A compra de R$$valorCompra teve um desconto pregressivo de " . ($desconto*100) . "%, totalizando: R$$final (R$" . ($valorCompra - $final) . " de desconto)";