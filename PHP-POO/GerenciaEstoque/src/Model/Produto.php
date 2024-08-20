<?php

namespace Codifica\Estoque\Model;

use Codifica\Estoque\Service\ValidaNumerosPositivos;
use Codifica\Estoque\Model\ProdutoInterface;

abstract class Produto implements ProdutoInterface
{
    protected string $titulo;
    protected float $preco;
    protected string $sku;
    static int $indiceSku = 0;
    protected int $vendas = 0;
    protected float $vendasTotais = 0;


    public function __construct(string $titulo, float $preco)
    {
        self::$indiceSku++;
        $this->titulo = $titulo;
        $this->preco = $this->validarNumeros($preco);
        $this->vendas = 0;
        $this->vendasTotais = 0;
    }

    protected function validarNumeros(float $numero): float
    {
        $validador = new ValidaNumerosPositivos();
        return $validador->validarNumeros($numero);
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setVendas(int $vendas): void
    {
        $this->vendas += $vendas;
    }

    public function getVendas(): int
    {
        return $this->vendas;
    }

    public function setVendasTotais(): void
    {
        $this->vendasTotais = $this->vendas * $this->preco;
    }

    public function getVendasTotais(): string
    {
        return number_format($this->vendasTotais, 2, ',', '.');
    }

    abstract protected function criarSku(): string;

    static function getContador(): int
    {
        return self::$indiceSku;
    }
}