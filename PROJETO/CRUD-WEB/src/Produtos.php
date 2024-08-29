<?php

namespace Codifica\Produtos;

session_start();

class Produtos
{
    public function listar(): array
    {
        $_SESSION['produtos'] = [];
        return $_SESSION['produtos'];
    }

    private function criarID(): int
    {
        $novoID = end($_SESSION['produtos'])['id'] + 1;
        return $novoID;
    }

    private function procurarIndice($id): int
    {
        $indice = array_search($id, array_column($_SESSION['produtos'], 'id'));
        return $indice;
    }

    public function atualizar(): void
    {
        header('Location: listagem.php');
        exit;
    }

    public function criar(): void
    {
        $id = $this->criarID();

        $_SESSION['produtos'][] = [
            'id' => $id,
            'nome' => $_POST['nome'],
            'sku' => $_POST['sku'],
            'unidade_medida_id' => $_POST['unidade-medida'],
            'valor' => $_POST['valor'],
            'quantidade' => $_POST['quantidade'],
            'categoria_id' => $_POST['tag'],
        ];

        $this->atualizar();
    }

    public function editar($id): void
    {
        $indice = $this->procurarIndice($id);
    
        if ($indice !== false) {
            $_SESSION['produtos'][$indice]['nome'] = $_POST['nome'];
            $_SESSION['produtos'][$indice]['sku'] = $_POST['sku'];
            $_SESSION['produtos'][$indice]['valor'] = $_POST['valor'];
            $_SESSION['produtos'][$indice]['quantidade'] = $_POST['quantidade'];
            $_SESSION['produtos'][$indice]['unidade_medida_id'] = $_POST['unidade-medida'];
            $_SESSION['produtos'][$indice]['categoria_id'] = $_POST['tag'];
        }

        $this->atualizar();
    }

    public function deletar($id): void
    {
        $indice = $this->procurarIndice($id);

        if ($indice !== false) {    
            unset($_SESSION['produtos'][$indice]);
            $_SESSION['produtos'] = array_values($_SESSION['produtos']);
            header('Location: listagem.php');
            exit;
        }

        $this->atualizar();
    }

    //Não entendi onde usaria a função salvar
    public function salvar()
    {

    }
    
}
