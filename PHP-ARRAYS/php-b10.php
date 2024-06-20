<?php

function calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra) {
    $total = $salarioBase + ($horasExtras * $valorHoraExtra);
    return $total;
}

function listarFuncionarios($funcionarios)
{
    foreach ($funcionarios as $key => $value) {
        ['salarioBase' => $salarioBase, 'horasExtras' => $horasExtras, 'valorHoraExtra' => $valorHoraExtra] = $value;
        $total = calcularSalarioTotal($salarioBase, $horasExtras, $valorHoraExtra);
        echo "$key: " . PHP_EOL;
        echo "Salario base = $salarioBase | "; 
        echo "Nº de horas extras = $horasExtras | "; 
        // echo "Valor da hora extra = $valorHoraExtra | ";
        echo "Salário total = $total ($salarioBase + " . ($valorHoraExtra * $horasExtras) . ")" . PHP_EOL . "~~~~~~~~~~" . PHP_EOL; 

    }
}

$dadosFuncionarios = [
    'Pedro' => [
        'salarioBase' => 2500,
        'horasExtras' => 10,
        'valorHoraExtra' => 0
    ],
    'Renata' => [
        'salarioBase'=> 3000,
        'horasExtras'=> 5,
        'valorHoraExtra' => 0
    ],
    'Sérgio' => [
        'salarioBase'=> 2800,
        'horasExtras'=> 8,
        'valorHoraExtra' => 0
    ],
    'Vanessa' => [
        'salarioBase'=> 3200,
        'horasExtras'=> 12,
        'valorHoraExtra' => 0
    ],
    'André' => [
        'salarioBase'=> 1700,
        'horasExtras'=> 0,
        'valorHoraExtra' => 0
    ],   
];

// Calcula valor da hora extra
foreach ($dadosFuncionarios as $indice => &$dados) {
    $extra = (($dados['salarioBase'] / 160) * 1.5);
    $dados['valorHoraExtra'] = $extra;
}


listarFuncionarios($dadosFuncionarios);