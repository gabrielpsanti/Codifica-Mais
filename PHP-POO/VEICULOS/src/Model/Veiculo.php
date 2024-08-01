<?php

namespace Codifica\Automoveis\Model;

use Codifica\Automoveis\Model\VeiculoInterface;

abstract class Veiculo implements VeiculoInterface
{
    public $modelo;
    public $cor;
    public $diferencial;
    const ANO_FABRICACAO = 2024;
    const FABRICANTE = 'Codifica Motors';

    public function __construct($modelo, $cor, $diferencial) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->diferencial = $diferencial;
    }

    public function calcularPreco() {
        return $this->modelo['preco'] + $this->cor['preco'] + $this->diferencial['preco'];
    }

    abstract public function ligaVeiculo(): void;
    abstract public function desligaVeiculo(): void;
}