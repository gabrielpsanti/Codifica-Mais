<?php 

$produto = 0;
$valorProduto = 0;
$valorTotal = 0;
$maisCaro = 0;
$arrayProduto = [];

function valorPessoa($total, $pessoas)
{
    if ($pessoas <= 1) {
        echo "O churrasco foi cancelado, todo mundo furou!";
        exit;
    } else {
        $porPessoa = $total/$pessoas;
        echo "Valor por pessoa: R$" . number_format($porPessoa, 2, ',', '.') . PHP_EOL;
    }
}

while ($produto != 'sair') {
    echo "Digite o nome do produto (digite 'sair' para encerrar): ";
    $produto = trim(fgets(STDIN));
    if ($produto == 'sair') {
        if (count($arrayProduto) == 0) {
            echo "Zero produtos, programa encerrado." . PHP_EOL;
            exit;
        } else {
            echo "Listagem encerrada." . PHP_EOL;
        }
    } else {
        $arrayProduto[] = $produto;

        while ($valorProduto <= 0) {
        echo "Digite o valor do produto (positivo e maior que zero): ";
        $valorProduto = trim(fgets(STDIN));
        $arrayValores[] = $valorProduto;
        if ($valorProduto > $maisCaro){
            $maisCaro = $valorProduto;
            $contador = count($arrayValores);
            // echo $contador . PHP_EOL;
        }
        if ($valorProduto <= 0){
            echo "Valor incorreto, digite novamente." . PHP_EOL;
        }
        }
        $valorTotal += $valorProduto;
        $valorProduto = 0;
    }
}

echo "Digite o número de participantes: ";
$participantes = trim(fgets(STDIN));

valorPessoa($valorTotal, $participantes);

$contador --;
echo "Produto mais caro: " . $arrayProduto[$contador] . " por R$" .  number_format($arrayValores[$contador], 2, ',', '.');