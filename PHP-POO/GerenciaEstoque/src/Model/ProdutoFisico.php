<?php

namespace Codifica\Estoque\Model;

use Codifica\Estoque\Model\Produto;


class ProdutoFisico extends Produto
{
    protected string $titulo;
    protected float $preco;
    protected int $quantidade;

    public function __construct(string $titulo, float $preco, int $quantidade)
    {
        parent::__construct($titulo, $preco);
        $this->quantidade = Produto::validarNumeros($quantidade);
    }

    protected function criarSku(): string
    {
        // Garante que o vai ter sempre 4 números preenchendo com 0 à esquerda
        $numeroFormatado = str_pad(parent::$indiceSku, 4, '0', STR_PAD_LEFT);
        return "MFIS-$numeroFormatado";
    }

    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $novoPreco): void
    {
        $this->preco = $novoPreco;
    }

    static public function getContador(): int
    {
        return self::$indiceSku;
    }  

}