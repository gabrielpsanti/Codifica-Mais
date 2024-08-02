<?php

class ProdutoDigital extends Produto
{
    protected float $desconto;

    public function __construct()
    {
        $this->desconto = $this->calculaDesconto();
    }

    public function calculaDesconto(): float
    {
        return Produto::getPreco() * 0.1;
    }
}