<?php

namespace App;

class Produto
{
    private int $id;
    private string $nome;
    private string $sku;
    private int $unidade_medida_id;
    private float $valor;
    private int $quantidade;
    private int $categoria_id;

    public function __construct(int $id, string $nome, string $sku, int $unidade_medida_id, float $valor, int $quantidade, int $categoria_id)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sku = $sku;
        $this->unidade_medida_id = $unidade_medida_id;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
        $this->categoria_id = $categoria_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getUnidadeMedidaId(): int
    {
        return $this->unidade_medida_id;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }   

    public function getCategoriaId(): int
    {
        return $this->categoria_id;
    }
}