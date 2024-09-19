<?php

namespace App;

use PDO;
use App\Produto;

class ProdutosRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function criarObjeto(array $dados): Produto
    {
        return new Produto(
            $dados['id'],
            $dados['nome'],
            $dados['sku'],
            $dados['unidade_medida_id'],
            $dados['valor'],
            $dados['quantidade'],
            $dados['categoria_id']
        );
    }

    public function gerarArrayDados(): array
    {
        return [
            'produtos' => $this->listarProdutos(),
            'categorias' => $this->listarCategorias(),
            'unidadesMedida' => $this->listarUnidadesMedida(),
        ];
    }

    public function listar(): void
    {
        include '../public/listagem.php';
        exit;
    }

    public function listarProdutos(): array
    {
        $sql = "SELECT * FROM produtos";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        // $conjuntoDeDados = array_map(function ($produto) {
        //     return $this->criarObjeto($produto);
        // }, $dados);

        // return $conjuntoDeDados;
        return $dados;
    }

    public function listarCategorias(): array 
    {
        $sql = "SELECT * FROM categorias";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function listarUnidadesMedida(): array
    {
        $sql = "SELECT * FROM unidades_medidas";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $dados;
    }

    public function salvar(Produto $produto): void
    {
        $sql = "INSERT INTO produtos (nome, sku, unidade_medida_id, valor, quantidade, categoria_id) VALUES (:nome, :sku, :unidade_medida_id, :valor, :quantidade, :categoria_id)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'nome' => $produto->getNome(),
            'sku' => $produto->getSku(),
            'unidade_medida_id' => $produto->getUnidadeMedidaId(),
            'valor' => $produto->getValor(),
            'quantidade' => $produto->getQuantidade(),
            'categoria_id' => $produto->getCategoriaId(),
        ]);
    }

}