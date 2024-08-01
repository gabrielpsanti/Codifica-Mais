<?php

namespace Codifica\Forma\Model\Types;

use Codifica\Forma\Model\Forma;
use Codifica\Forma\Service\ValidacaoDimensoes;

class Retangulo extends Forma
{
    protected float $largura;
    protected float $altura;
    protected float $areaTotal;
    public function __construct(float $largura, float $altura)
    {
        $validador = new ValidacaoDimensoes();
        $this->largura = $validador->validarNumeros($largura);
        $this->altura = $validador->validarNumeros($altura);
    }
    public function calcularArea() :string
    {
        $this->areaTotal = $this->largura * $this->altura;
        return "Area total do retângulo: {$this->areaTotal}";
    }
}