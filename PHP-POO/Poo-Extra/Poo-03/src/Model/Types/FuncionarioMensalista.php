<?php

namespace Codifica\Funcionarios\Model\Types;

use Codifica\Funcionarios\Model\FuncionarioBase;

class FuncionarioMensalista extends FuncionarioBase
{    
    public function calcularSalario(): float
    {
        return $this->salarioBase;
    }

    public function exibirInformacoes(): void
    {
        echo "\n>> Exibindo Informações (Mensalista) <<\n" . 
        "Funcionário:           $this->nome\n" .
        "Salário total:         R$ " . number_format($this->salarioBase, 2, ',', '.') . "\n\n";
        return;
    }

}