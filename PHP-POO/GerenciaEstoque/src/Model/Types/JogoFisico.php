<?php

namespace Codifica\Estoque\Model\Types;

use Codifica\Estoque\Model\ProdutoFisico;

class JogoFisico extends ProdutoFisico
{
    protected string $titulo;
    protected float $preco;
    protected int $quantidade;
    protected string $sku;
    protected string $publisher;

    public function __construct(string $titulo, float $preco, int $quantidade, string $publisher)
    {
        parent::__construct($titulo, $preco, $quantidade);
        $this->publisher = $publisher;
        $this->sku = $this->criarSku();
    }

    protected function criarSku(): string
    {
        // Pega final do SKU do tipo de produto pai. Por exemplo: FIS-003, resultando em: BOOK-FIS-003
        $getFunction = parent::criarSku();
        $skuFinal = "GAME-$getFunction";
        return $skuFinal;
    }

    public function getProduto(): void
    {
        echo "--------------------------------------------------------\n";
        echo ">> Jogo Mídia Física <<\n";
        echo "SKU: {$this->sku}\n";
        echo "Título: {$this->titulo}\n";
        echo "Publisher: {$this->publisher}\n";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "\n";
        echo "Estoque: {$this->quantidade}\n";
        echo "Vendas: {$this->vendas}\n";
        echo "Total vendas: R$ " . number_format($this->vendasTotais, 2, ',', '.') . "\n";
    }


    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }
}