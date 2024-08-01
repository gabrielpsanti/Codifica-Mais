<?php

require_once "autoload.php";

use Codifica\Forma\Model\Types\{Circulo, Retangulo};

enum TabelaFormas: int
{
    case RETANGULO = 1;
    case CIRCULO = 2;
    case SAIR = 3;

}

echo "Escolha uma forma: \n";
echo "1 - Retângulo\n";
echo "2 - Circulo\n";
echo "3 - Sair\n";
$escolha = (int) readline("Opção desejada: ");

// O switch case daria pra fazer com numeral mesmo, mas tô testando esse Enum aí que disseram que é útil
switch ($escolha) {
    case TabelaFormas::RETANGULO->value:
        echo "Escreva as dimensões do retângulo:\n";
        $largura = (float) readline("Largura: ");
        $altura = (float) readline("Altura: ");
        $retangulo = new Retangulo($largura, $altura);
        echo $retangulo->calcularArea();
        break;
    case TabelaFormas::CIRCULO->value:
        echo "Escreva o raio do circulo:\n";
        $raio = (float) readline("Raio: ");
        $circulo = new Circulo($raio);
        echo $circulo->calcularArea();
        break;
    case TabelaFormas::SAIR->value:
        echo "Saindo...\n";
        break;
    default:
        echo "Opção inválida\n";
        break;
}