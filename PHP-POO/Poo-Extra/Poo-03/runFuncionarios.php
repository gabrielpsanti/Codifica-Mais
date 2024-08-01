<?php

require_once 'autoload.php';

use Codifica\Funcionarios\Model\Types\{FuncionarioMensalista, FuncionarioHorista};

enum TabelaTrabalhadores: int
{
    case HORISTA = 1;
    case MENSALISTA = 2;
    case SAIR = 3;

}

echo "Escolha o tipo de funcionário: \n";
echo "1 - Horista\n";
echo "2 - Mensalista\n";
echo "3 - Sair\n";
$escolha = (int) readline("Opção desejada: ");

switch ($escolha) {
    case TabelaTrabalhadores::HORISTA->value:
        $nome = (string) readline("Digite o nome do funcionário: ");
        $salarioHora = (float) readline("Digite o valor recebido por hora: ");
        $horas = (int) readline("Digite o nº de horas trabalhadas: ");
        $horista = new FuncionarioHorista($nome, $salarioHora, $horas);
        echo "\nSalário Total de $nome: R$" . number_format($horista->calcularSalario(), 2, ',', '.') . PHP_EOL;
        $horista->exibirInformacoes();
        break;
    case TabelaTrabalhadores::MENSALISTA->value:
        $nome = (string) readline("Digite o nome do funcionário: ");
        $salarioBase = (float) readline("Digite o salário base: ");
        $mensalista = new FuncionarioMensalista($nome, $salarioBase);
        echo "\nSalário Base de $nome: " . number_format($mensalista->calcularSalario(), 2, ',', '.') . PHP_EOL;
        $mensalista->exibirInformacoes();
        break;
    case TabelaTrabalhadores::SAIR->value:
        echo "Saindo...\n";
        break;
    default:
        echo "Opção inválida\n";
        break;
}