<?php

namespace Codifica\Estoque\Model;

use Codifica\Estoque\Model\Produto;

class ProdutoDigital extends Produto
{
    protected string $titulo;
    protected float $preco;
    protected string $precoAntigo;

    public function __construct(string $titulo, float $preco)
    {
        parent::__construct($titulo, $preco);
        $this->precoAntigo = $this->formataPrecoAntigo($preco);
        $this->preco = $this->calculaDesconto($preco);
    }

    protected function criarSku(): string
    {
        // Garante que o vai ter sempre 4 números preenchendo com 0 à esquerda
        $numeroFormatado = str_pad(parent::$indiceSku, 4, '0', STR_PAD_LEFT);
        return "MDIG-$numeroFormatado";
    }

    protected function calculaDesconto(float $preco): float
    {
        return $preco * 0.75;
    }

    protected function formataPrecoAntigo(float $precoAntigo): string
    {
        $precoFormatado = "R$ " . number_format($precoAntigo, 2, ',', '.');
        $tamanhoString = strlen($precoFormatado);
        $final = '';

        for ($i = 0; $i < $tamanhoString; $i++) {
            $letra = substr($precoFormatado, $i, 1);
            $final .= "$letra\u{0336}"; //gambiarra pra fazer texto ficar riscado
        }

        return $final;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPrecos(float $novoPreco): void
    {
        $this->precoAntigo = $this->formataPrecoAntigo($novoPreco);
        $this->preco = $this->calculaDesconto($novoPreco);
    }

    static public function getContador(): int
    {
        return self::$indiceSku;
    }  
}