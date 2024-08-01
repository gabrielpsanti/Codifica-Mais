<?php

namespace Codifica\Funcionarios\Model\Types;

use Codifica\Funcionarios\Model\FuncionarioBase;

class FuncionarioHorista extends FuncionarioBase
{
    protected int $horasTrabalhas;
    protected float $salarioTotal;
    
    public function __construct(string $nome, float $salarioBase, int $horasTrabalhas)
    {
        parent::__construct($nome, $salarioBase);
        $this->horasTrabalhas = $horasTrabalhas;
        $this->salarioTotal = $this->calcularSalario();
    }

    public function calcularSalario(): float
    {
        // Funcionario Horista vai considerar o salarioBase como o valor da hora trabalhada
        $salarioFinal = $this->horasTrabalhas * $this->salarioBase;
        return $salarioFinal;
    }

    public function exibirInformacoes(): void
    {
        echo "\n>> Exibindo Informações (Horista) <<\n" . 
        "Funcionário:           $this->nome\n" .
        "Horas trabalhadas:     $this->horasTrabalhas\n" .
        "Valor hora:            R$ " . number_format($this->salarioBase, 2, ',', '.') . PHP_EOL .
        "Salário Total:         R$ " . number_format($this->salarioTotal, 2, ',', '.') . "\n\n";
        return;
    }
}