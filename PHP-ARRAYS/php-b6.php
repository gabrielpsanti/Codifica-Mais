<?php

function calcularImc($peso, $altura){
    $imc = $peso / ($altura * $altura);

    if ($imc >= 40) {
        $classificacao = 'Obesidade grau III';
    } elseif ($imc < 40 && $imc >= 35) {
        $classificacao = 'Obesidade grau II';
    } elseif ($imc < 35 && $imc >= 30) {
        $classificacao = 'Obesidade grau I';
    } elseif ($imc < 30 && $imc >= 25) {
        $classificacao = 'Sobrepso';
    } elseif ($imc < 25 && $imc >= 18.5) {
        $classificacao = 'Normal';
    } else {
        $classificacao = 'Magreza';
    }

    $resultado = [ // Daria para dar echo dentro da própria função
        'valorImc' => $imc,
        'valorClassificacao'=> $classificacao
    ];

    return $resultado;
}

echo "Digite o peso (em quilogramas): ";
$peso = trim(fgets(STDIN));
echo "Digite a altura (em metros): ";
$altura = trim(fgets(STDIN));

$array = calcularImc($peso, $altura);

echo "IMC (kg/m²): $array[valorImc] | Classificação: $array[valorClassificacao]";
