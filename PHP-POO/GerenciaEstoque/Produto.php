<?php

require_once 'ValidaNumerosPositivos.php';
require_once 'ProdutoInterface.php';

class Produto implements ProdutoInterface
{
    // static array $produtos = [];
    protected string $titulo;
    protected string $sku;
    protected float $preco;

    public function __construct(string $sku, string $titulo, float $preco)
    {
        $this->sku = $sku;
        $this->titulo = $titulo;
        $this->preco = $this->validarNumeros($preco);
        // SELF::$produtos[] = [
        //     [
        //         'sku' => $this->sku,
        //         'titulo' => $this->titulo,
        //         'unidade_medida' => $this->unidade_medida,
        //         'quantidade' => $this->quantidade,
        //         'preco' => $this->preco
        //     ]
        // ];
    }

    private function validarNumeros($numero): float
    {
        $validador = new ValidaNumerosPositivos();
        return $validador->validarNumeros($numero);
    }

    public function getProduto(): void
    {
        echo "SKU: {$this->sku}\n";
        echo "titulo: {$this->titulo}\n";
        echo "Preço: {$this->preco}\n";
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }
    // static function listarProdutos(): void
    // {
    //     foreach (SELF::$produtos as $produto){
    //         foreach($produto as $categoria => $valores)
    //         {
    //             echo "$categoria: $valores\n";
    //         }
    //     }
    // }

}

$produto = new Produto('SKU01', 'Computador DELL 15495', 50);
$produto->getProduto();