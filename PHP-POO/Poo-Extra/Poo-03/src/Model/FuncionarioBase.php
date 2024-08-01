<?php

namespace Codifica\Funcionarios\Model;

use Codifica\Funcionarios\Service\ValidacaoNumeros;

abstract class FuncionarioBase implements Funcionario
{
    protected string $nome;
    protected float $salarioBase;

    public function __construct(string $nome, float $salarioBase)
    {
        $this->nome = $nome;
        $this->salarioBase = $salarioBase;
        $validador = new ValidacaoNumeros();
        $this->salarioBase = $validador->validarNumeros($salarioBase);

        echo "Funcionário $this->nome registrado com sucesso.\n";
    }

    abstract function calcularSalario(): float;
    abstract function exibirInformacoes(): void;

}