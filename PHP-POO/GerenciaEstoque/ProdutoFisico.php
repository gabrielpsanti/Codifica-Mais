<?php

require_once 'ValidaNumerosPositivos.php';
class ProdutoFisico extends Produto
{
    protected int $quantidade;

    public function __construct(int $quantidade)
    {
        $this->quantidade = $this->validarNumeros($quantidade);
    }

    private function validarNumeros($numero): float
    {
        $validador = new ValidaNumerosPositivos();
        return $validador->validarNumeros($numero);
    }

}