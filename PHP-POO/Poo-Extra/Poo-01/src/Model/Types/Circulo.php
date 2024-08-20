<?php

namespace Codifica\Forma\Model\Types;

use Codifica\Forma\Model\Forma;
use Codifica\Forma\Service\ValidacaoDimensoes;

class Circulo extends Forma
{
    protected float $raio;
    protected float $areaTotal;
    public function __construct(float $raio)
    {
        $validador = new ValidacaoDimensoes();
        $this->raio = $validador->validarNumeros($raio);
    }

    public function calcularArea() :string
    {
        $this->areaTotal = pi() * ($this->raio * $this->raio);
        return "Area total do circulo: {$this->areaTotal}";
    }
}