<?php

class Produto 
{
    private string $nome;
    private float $preco;
    private int $estoque;

    public function __CONSTRUCT(string $nome, float $preco, int $estoque)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
        echo "-> Produto $this->nome criado com sucesso.\n";
    }

    public function alterarPreco($novoPreco) :void
    {
        echo "-> Preço do produto $this->nome atualizado com sucesso.\nPreço anterior: R$ " 
        . number_format($this->preco, 2, ',', '.') 
        . " | Preço atualizado: R$ " 
        . number_format($novoPreco, 2, ',', '.') . 
        ".\n";
        $this->preco = $novoPreco;
        return;
    }

    public function alterarEstoque($novoEstoque) :void
    {
        echo "-> Estoque do produto $this->nome atualizado com sucesso.\n";
        echo "Estoque anterior: $this->estoque | Estoque atualizado: $novoEstoque.\n";
        $this->estoque = $novoEstoque;
        return;
    }

    public function exibirDetalhes() :void
    {
        echo "-> Detalhes do Produto \n";
        echo "Nome:     $this->nome\n";
        echo "Preço:    R$ " . number_format($this->preco, 2, ',', '.') . "\n"; 
        echo "Estoque:  $this->estoque unidades\n";
        return;
    }

}