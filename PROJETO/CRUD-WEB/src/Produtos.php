<?php

namespace Codifica\Produtos;

session_start();

class Produtos
{
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

    public function listar()
    {
        include '../public/listagem.php';
        exit;
    }

    public function criar()
    {
        include '../public/formulario-cadastro.php';
    }

    public function salvar(): void
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

    }

    public function editar()
    {
        include '../public/formulario-edit.php';
    }

    public function atualizar($id): void
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

    }

    public function deletar($id): void
    {
        $indice = $this->procurarIndice($id);

        if ($indice !== false) {    
            unset($_SESSION['produtos'][$indice]);
            $_SESSION['produtos'] = array_values($_SESSION['produtos']);
            header('Location: /');
        }
    }
    
}
