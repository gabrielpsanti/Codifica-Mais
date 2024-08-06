<?php

namespace Codifica\Estoque\Model\Types;

use Codifica\Estoque\Model\ProdutoDigital;

class JogoDigital extends ProdutoDigital
{
    protected string $titulo;
    protected float $preco;
    protected float $precoFinal;
    protected string $sku;
    protected string $publisher;

    public function __construct(string $titulo, float $preco, string $publisher)
    {
        parent::__construct($titulo, $preco);
        $this->precoFinal = parent::calculaDesconto($preco);
        $this->publisher = $publisher;
        $this->sku = $this->criarSku();
    }

    protected function criarSku(): string
    {
        // Pega final do SKU do tipo de produto pai. Por exemplo: DIG-003, resultando em: DIG-FIS-003
        $getFunction = parent::criarSku();
        $skuFinal = "GAME-$getFunction";
        return $skuFinal;
    }

    public function getProduto(): void
    {
        echo "--------------------------------------------------------\n";
        echo ">> Jogo Mídia Digital <<\n";
        echo "SKU: {$this->sku}\n";
        echo "Título: {$this->titulo}\n";
        echo "Publisher: {$this->publisher}\n";
        echo "Preço de {$this->precoAntigo}  por R$ " . number_format($this->preco, 2, ',', '.') . " (25% de desconto)\n";
        echo "Vendas: {$this->vendas}\n";
        echo "Total vendas: R$ " . number_format($this->vendasTotais, 2, ',', '.') . "\n";
    }


    public function getpublisher(): string
    {
        return $this->publisher;
    }

}