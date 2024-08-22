<?php

namespace Codifica\Automoveis\Model;

use Codifica\Automoveis\Model\Veiculo;

class Carro extends Veiculo
{
    public function acelerar(): void
    {
        echo "A carro CodificaCar {$this->modelo['descricao']} {$this->cor['descricao']} " . Veiculo::ANO_FABRICACAO . " acelerou.\n";
    }
    
    public function frear(): void
    {
        echo "A carro CodificaCar {$this->modelo['descricao']} {$this->cor['descricao']} " . Veiculo::ANO_FABRICACAO . " freou.\n";
    }
    public function exibirDetalhes(): void 
    {
        echo 
        "Carro CodificaCar {$this->modelo['descricao']}" . PHP_EOL .
        "Combustível: {$this->diferencial['descricao']}" . PHP_EOL .
        "Cor: {$this->cor['descricao']}" . PHP_EOL .
        "Ano de Fabricacão: " . Veiculo::ANO_FABRICACAO . PHP_EOL .
        "Fabricante: " . Veiculo::FABRICANTE . PHP_EOL;
    }
    public function ligaVeiculo(): void
    {
        echo "A carro CodificaCar {$this->modelo['descricao']} {$this->cor['descricao']} " . Veiculo::ANO_FABRICACAO . " ligou.\n";
    }
    public function desligaVeiculo(): void
    {
        echo "A carro CodificaCar {$this->modelo['descricao']} {$this->cor['descricao']} " . Veiculo::ANO_FABRICACAO . " desligou.\n";
    }
}