<?php

namespace Codifica\Estoque\Model\Types;

use Codifica\Estoque\Model\ProdutoFisico;

class LivroFisico extends ProdutoFisico
{
    protected string $titulo;
    protected float $preco;
    protected int $quantidade;
    protected string $sku;
    protected int $numPaginas;
    protected string $editora;

    public function __construct(string $titulo, float $preco, int $quantidade, int $numPaginas, string $editora)
    {
        parent::__construct($titulo, $preco, $quantidade);
        $this->numPaginas = parent::validarNumeros($numPaginas);
        $this->editora = $editora;
        $this->sku = $this->criarSku();
    }

    protected function criarSku(): string
    {
        // Pega final do SKU do tipo de produto pai. Por exemplo: FIS-003, resultando em: BOOK-FIS-003
        $getFunction = parent::criarSku();
        $skuFinal = "BOOK-$getFunction";
        return $skuFinal;
    }

    public function getProduto(): void
    {
        echo "--------------------------------------------------------\n";
        echo ">> Livro Mídia Física <<\n";
        echo "SKU: {$this->sku}\n";
        echo "Título: {$this->titulo}\n";
        echo "Número de Páginas: {$this->numPaginas}\n";
        echo "Editora: {$this->editora}\n";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "\n";
        echo "Estoque: {$this->quantidade}\n";
        echo "Vendas: {$this->vendas}\n";
        echo "Total vendas: R$ " . number_format($this->vendasTotais, 2, ',', '.') . "\n";
    }


    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getNumPaginas(): int
    {
        return $this->numPaginas;
    }

    public function getEditora(): string
    {
        return $this->editora;
    }
}