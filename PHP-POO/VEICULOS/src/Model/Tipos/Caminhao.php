<?php

namespace Codifica\Veiculos\Model\Tipos;

use Codifica\Veiculos\Model\Veiculo;

class Caminhao extends Veiculo
{
    protected int $eixos;

    public function __construct(string $nome, int $anoFabricacao, string $cor, int $eixos){
        parent::__construct($nome, $anoFabricacao, $cor);
        $this->eixos = $eixos;
    }

    public function getEixos()
    {
        return $this->eixos;
    }

    public function getDetalhes(): void
    {
        echo $this->getVeiculo() . " | Eixos: {$this->eixos}\n";
    }
}