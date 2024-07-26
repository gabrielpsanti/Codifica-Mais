<?php

namespace Codifica\Veiculos\Model\Tipos;

use Codifica\Veiculos\Model\Veiculo;

class Carro extends Veiculo
{
    protected int $portas;

    public function __construct(string $nome, int $anoFabricacao, string $cor, int $portas){
        parent::__construct($nome, $anoFabricacao, $cor);
        $this->portas = $portas;
    }

    public function getportas()
    {
        return $this->portas;
    }
}