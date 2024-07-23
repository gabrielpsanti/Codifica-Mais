<?php

class Funcionario
{
    private string $nome;
    private string $cargo;
    private float $salario;

    public function __CONSTRUCT($nome, $cargo, $salario)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->salario = $salario;
        echo "-> Funcionário $this->nome foi registrado com sucesso no cargo de $this->cargo com salário de R$ " 
        . number_format($this->salario, 2, ',', '.')
        . ".\n";
    }

    public function alterarSalario(float $novoSalario) :void
    {
        echo "-> Salário do funcionário $this->nome atualizado com sucesso.\n" 
        . "Salário antigo: R$ "
        . number_format($this->salario, 2, ',', '.') 
        . " | Salário atualizado: R$ "
        . number_format($novoSalario, 2, ',', '.')
        . ".\n";
        $this->salario = $novoSalario;
        return;
    }

    public function alterarCargo(string $novoCargo) :void
    {
        echo "-> Cargo do funcionário $this->nome atualizado com sucesso.\n";
        echo "Cargo antigo: $this->cargo | Cargo atualizado: $novoCargo.\n";
        $this->cargo = $novoCargo;
        return;
    }

    public function exibirDetalhes() :void
    {
        echo "-> Detalhes do Funcionário \n";
        echo "Nome:     $this->nome\n";
        echo "Cargo:    $this->cargo\n";
        echo "Salário:  R$ " . number_format($this->salario, 2, ',', '.') . "\n"; 
        return;
    }
}