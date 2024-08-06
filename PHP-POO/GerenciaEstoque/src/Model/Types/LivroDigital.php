<?php

namespace Codifica\Estoque\Model\Types;

use Codifica\Estoque\Model\ProdutoDigital;

class LivroDigital extends ProdutoDigital
{
    protected string $sku;
    protected int $numPaginas;
    protected string $editora;

    public function __construct(string $titulo, float $preco, int $numPaginas, string $editora)
    {
        parent::__construct($titulo, $preco);
        $this->numPaginas = parent::validarNumeros($numPaginas);
        $this->editora = $editora;
        $this->sku = $this->criarSku();
    }

    protected function criarSku(): string
    {
        // Pega final do SKU do tipo de produto pai. Por exemplo: DIG-003, resultando em: DIG-FIS-003
        $getFunction = parent::criarSku();
        $skuFinal = "BOOK-$getFunction";
        return $skuFinal;
    }

    public function getProduto(): void
    {
        echo "--------------------------------------------------------\n";
        echo ">> Livro Mídia Digital <<\n";
        echo "SKU: {$this->sku}\n";
        echo "Título: {$this->titulo}\n";
        echo "Número de Páginas: {$this->numPaginas}\n";
        echo "Editora: {$this->editora}\n";
        echo "Preço de {$this->precoAntigo}  por R$ " . number_format($this->preco, 2, ',', '.') . " (25% de desconto)\n";
        echo "Vendas: {$this->vendas}\n";
        echo "Total vendas: R$ " . number_format($this->vendasTotais, 2, ',', '.') . "\n";
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