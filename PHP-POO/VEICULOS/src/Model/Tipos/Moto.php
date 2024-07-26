<?php

namespace Codifica\Veiculos\Model\Tipos;

use Codifica\Veiculos\Model\Veiculo;

class Moto extends Veiculo
{
    protected int $cilindradas;

    public function __construct(string $nome, int $anoFabricacao, string $cor, int $cilindradas){
        parent::__construct($nome, $anoFabricacao, $cor);
        $this->cilindradas = $cilindradas;
    }

    public function getCilindradas()
    {
        return $this->cilindradas;
    }

    public function getDetalhes(): void
    {
        echo $this->getVeiculo() . " | Cilindradas: {$this->cilindradas}\n";
    }
}